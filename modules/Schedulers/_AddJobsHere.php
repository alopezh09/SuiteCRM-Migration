<?php
if (! defined('sugarEntry') || ! sugarEntry) {
    die('Not A Valid Entry Point');
}
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2016 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/


/**
 * Set up an array of Jobs with the appropriate metadata
 * 'jobName' => array (
 *        'X' => 'name',
 * )
 * 'X' should be an increment of 1
 * 'name' should be the EXACT name of your function
 *
 * Your function should not be passed any parameters
 * Always  return a Boolean. If it does not the Job will not terminate itself
 * after completion, and the webserver will be forced to time-out that Job instance.
 * DO NOT USE sugar_cleanup(); in your function flow or includes.  this will
 * break Schedulers.  That function is called at the foot of cron.php
 */

/**
 * This array provides the Schedulers admin interface with values for its "Job"
 * dropdown menu.
 */
$job_strings = array(
    0 => 'refreshJobs',
    1 => 'pollMonitoredInboxes',
    2 => 'runMassEmailCampaign',
    3 => 'pruneDatabase',
    4 => 'trimTracker',
    5 => 'pollMonitoredInboxesForBouncedCampaignEmails',
    6 => 'pollMonitoredInboxesAOP',
    7 => 'aodIndexUnindexed',
    8 => 'aodOptimiseIndex',
    9 => 'aorRunScheduledReports',
    10 => 'processAOW_Workflow',
    12 => 'sendEmailReminders',
    14 => 'cleanJobQueue',
    15 => 'removeDocumentsFromFS',
    16 => 'trimSugarFeeds',
    17 => 'calcularEdadProspecto',
    18 => 'calcularAnosSinEstudiar',
    19 => 'descartarProspecto',
    20 => 'calcularEdadEstudiante',
    21 => 'calcularEdadConyuge',
    22 => 'calcularEdadHijos',
    23 => 'prospecto_no_contactado',
    24 => 'alerta_loo',
    25 => 'establecer_perdida',
    26 => 'actualizar_estado_cursos',
    27 => 'actualizar_estado_requerimientos',
    28 => 'Update_Workflow_Info',
    29 => 'set_times',
    30 => 'semaforizacion',
    31 => 'send_remainders',
    32 => 'execute_whatsapp_auto_msgs',

);

/**
 * Job 0 refreshes all job schedulers at midnight
 * DEPRECATED
 */
function refreshJobs()
{
    return true;
}


/**
 * Job 1
 */
function pollMonitoredInboxes()
{

    $_bck_up = array(
        'team_id' => $GLOBALS['current_user']->team_id,
        'team_set_id' => $GLOBALS['current_user']->team_set_id
    );
    $GLOBALS['log']->info('----->Scheduler fired job of type pollMonitoredInboxes()');
    global $dictionary;
    global $app_strings;


    require_once('modules/Emails/EmailUI.php');

    $ie      = new InboundEmail();
    $emailUI = new EmailUI();
    $r       = $ie->db->query('SELECT id, name FROM inbound_email WHERE is_personal = 0 AND deleted=0 AND status=\'Active\' AND mailbox_type != \'bounce\'');
    $GLOBALS['log']->debug('Just got Result from get all Inbounds of Inbound Emails');

    while ($a = $ie->db->fetchByAssoc($r)) {
        $GLOBALS['log']->debug('In while loop of Inbound Emails');
        $ieX = new InboundEmail();
        $ieX->retrieve($a['id']);;
        $mailboxes = $ieX->mailboxarray;
        foreach ($mailboxes as $mbox) {
            $ieX->mailbox        = $mbox;
            $newMsgs             = array();
            $msgNoToUIDL         = array();
            $connectToMailServer = false;
            if ($ieX->isPop3Protocol()) {
                $msgNoToUIDL = $ieX->getPop3NewMessagesToDownloadForCron();
                // get all the keys which are msgnos;
                $newMsgs = array_keys($msgNoToUIDL);
            }
            if ($ieX->connectMailserver() == 'true') {
                $connectToMailServer = true;
            } // if

            $GLOBALS['log']->debug('Trying to connect to mailserver for [ ' . $a['name'] . ' ]');
            if ($connectToMailServer) {
                $GLOBALS['log']->debug('Connected to mailserver');
                if (! $ieX->isPop3Protocol()) {
                    $newMsgs = $ieX->getNewMessageIds();
                }
                if (is_array($newMsgs)) {
                    $current = 1;
                    $total   = count($newMsgs);
                    require_once("include/SugarFolders/SugarFolders.php");
                    $sugarFolder         = new SugarFolder();
                    $groupFolderId       = $ieX->groupfolder_id;
                    $isGroupFolderExists = false;
                    $users               = array();
                    if ($groupFolderId != null && $groupFolderId != "") {
                        $sugarFolder->retrieve($groupFolderId);
                        $isGroupFolderExists = true;
                    } // if
                    $messagesToDelete = array();
                    if ($ieX->isMailBoxTypeCreateCase()) {
                        $users[]            = $sugarFolder->assign_to_id;
                        $distributionMethod = $ieX->get_stored_options("distrib_method", "");
                        if ($distributionMethod != 'roundRobin') {
                            $counts = $emailUI->getAssignedEmailsCountForUsers($users);
                        } else {
                            $lastRobin = $emailUI->getLastRobin($ieX);
                        }
                        $GLOBALS['log']->debug('distribution method id [ ' . $distributionMethod . ' ]');
                    }
                    foreach ($newMsgs as $k => $msgNo) {
                        $uid = $msgNo;
                        if ($ieX->isPop3Protocol()) {
                            $uid = $msgNoToUIDL[$msgNo];
                        } else {
                            $uid = imap_uid($ieX->conn, $msgNo);
                        } // else
                        if ($isGroupFolderExists) {
                            if ($ieX->importOneEmail($msgNo, $uid)) {
                                // add to folder
                                $sugarFolder->addBean($ieX->email);
                                if ($ieX->isPop3Protocol()) {
                                    $messagesToDelete[] = $msgNo;
                                } else {
                                    $messagesToDelete[] = $uid;
                                }
                                if ($ieX->isMailBoxTypeCreateCase()) {
                                    $userId = "";
                                    if ($distributionMethod == 'roundRobin') {
                                        if (sizeof($users) == 1) {
                                            $userId    = $users[0];
                                            $lastRobin = $users[0];
                                        } else {
                                            $userIdsKeys  = array_flip($users); // now keys are values
                                            $thisRobinKey = $userIdsKeys[$lastRobin] + 1;
                                            if (! empty($users[$thisRobinKey])) {
                                                $userId    = $users[$thisRobinKey];
                                                $lastRobin = $users[$thisRobinKey];
                                            } else {
                                                $userId    = $users[0];
                                                $lastRobin = $users[0];
                                            }
                                        } // else
                                    } else {
                                        if (sizeof($users) == 1) {
                                            foreach ($users as $k => $value) {
                                                $userId = $value;
                                            } // foreach
                                        } else {
                                            asort($counts); // lowest to highest
                                            $countsKeys           = array_flip($counts); // keys now the 'count of items'
                                            $leastBusy            = array_shift($countsKeys); // user id of lowest item count
                                            $userId               = $leastBusy;
                                            $counts[$leastBusy] = $counts[$leastBusy] + 1;
                                        }
                                    } // else
                                    $GLOBALS['log']->debug('userId [ ' . $userId . ' ]');
                                    $ieX->handleCreateCase($ieX->email, $userId);
                                } // if
                            } // if
                        } else {
                            if ($ieX->isAutoImport()) {
                                $ieX->importOneEmail($msgNo, $uid);
                            } else {
                                /*If the group folder doesn't exist then download only those messages
                                 which has caseid in message*/
                                $ieX->getMessagesInEmailCache($msgNo, $uid);
                                $email                 = new Email();
                                $header                = imap_headerinfo($ieX->conn, $msgNo);
                                $email->name           = $ieX->handleMimeHeaderDecode($header->subject);
                                $email->from_addr      = $ieX->convertImapToSugarEmailAddress($header->from);
                                $email->reply_to_email = $ieX->convertImapToSugarEmailAddress($header->reply_to);
                                if (! empty($email->reply_to_email)) {
                                    $contactAddr = $email->reply_to_email;
                                } else {
                                    $contactAddr = $email->from_addr;
                                }
                                $mailBoxType = $ieX->mailbox_type;
                                $ieX->handleAutoresponse($email, $contactAddr);
                            } // else
                        } // else
                        $GLOBALS['log']->debug('***** On message [ ' . $current . ' of ' . $total . ' ] *****');
                        $current++;
                    } // foreach
                    // update Inbound Account with last robin
                    if ($ieX->isMailBoxTypeCreateCase() && $distributionMethod == 'roundRobin') {
                        $emailUI->setLastRobin($ieX, $lastRobin);
                    } // if

                } // if
                if ($isGroupFolderExists) {
                    $leaveMessagesOnMailServer = $ieX->get_stored_options("leaveMessagesOnMailServer", 0);
                    if (! $leaveMessagesOnMailServer) {
                        if ($ieX->isPop3Protocol()) {
                            $ieX->deleteMessageOnMailServerForPop3(implode(",", $messagesToDelete));
                        } else {
                            $ieX->deleteMessageOnMailServer(implode(
                                $app_strings['LBL_EMAIL_DELIMITER'],
                                $messagesToDelete
                            ));
                        }
                    }
                }
            } else {
                $GLOBALS['log']->fatal("SCHEDULERS: could not get an IMAP connection resource for ID [ {$a['id']} ]. Skipping mailbox [ {$a['name']} ].");
                // cn: bug 9171 - continue while
            } // else
        } // foreach
        imap_expunge($ieX->conn);
        imap_close($ieX->conn, CL_EXPUNGE);
    } // while;
    return true;
}

/**
 * Job 2
 */
function runMassEmailCampaign()
{
    if (! class_exists('LoggerManager')) {
    }
    $GLOBALS['log'] = LoggerManager::getLogger('emailmandelivery');
    $GLOBALS['log']->debug('Called:runMassEmailCampaign');

    if (! class_exists('DBManagerFactory')) {
        require('include/database/DBManagerFactory.php');
    }

    global $beanList;
    global $beanFiles;
    require("config.php");
    require('include/modules.php');
    if (! class_exists('AclController')) {
        require('modules/ACL/ACLController.php');
    }

    require('modules/EmailMan/EmailManDelivery.php');
    return true;
}

/**
 *  Job 3
 */
function pruneDatabase()
{
    $GLOBALS['log']->info('----->Scheduler fired job of type pruneDatabase()');
    $backupDir  = sugar_cached('backups');
    $backupFile = 'backup-pruneDatabase-GMT0_' . gmdate('Y_m_d-H_i_s', strtotime('now')) . '.php';

    $db          = DBManagerFactory::getInstance();
    $tables      = $db->getTablesArray();
    $queryString = array();

    if (! empty($tables)) {
        foreach ($tables as $kTable => $table) {
            // find tables with deleted=1
            $columns = $db->get_columns($table);
            // no deleted - won't delete
            if (empty($columns['deleted'])) {
                continue;
            }

            $custom_columns = array();
            if (array_search($table . '_cstm', $tables)) {
                $custom_columns = $db->get_columns($table . '_cstm');
                if (empty($custom_columns['id_c'])) {
                    $custom_columns = array();
                }
            }

            $qDel = "SELECT * FROM $table WHERE deleted = 1";
            $rDel = $db->query($qDel);

            // make a backup INSERT query if we are deleting.
            while ($aDel = $db->fetchByAssoc($rDel, false)) {
                // build column names

                $queryString[] = $db->insertParams($table, $columns, $aDel, null, false);

                if (! empty($custom_columns) && ! empty($aDel['id'])) {
                    $qDelCstm = 'SELECT * FROM ' . $table . '_cstm WHERE id_c = ' . $db->quoted($aDel['id']);
                    $rDelCstm = $db->query($qDelCstm);

                    // make a backup INSERT query if we are deleting.
                    while ($aDelCstm = $db->fetchByAssoc($rDelCstm)) {
                        $queryString[] = $db->insertParams($table, $custom_columns, $aDelCstm, null, false);
                    } // end aDel while()

                    $db->query('DELETE FROM ' . $table . '_cstm WHERE id_c = ' . $db->quoted($aDel['id']));
                }
            } // end aDel while()
            // now do the actual delete
            $db->query('DELETE FROM ' . $table . ' WHERE deleted = 1');
        } // foreach() tables

        if (! file_exists($backupDir) || ! file_exists($backupDir . '/' . $backupFile)) {
            // create directory if not existent
            mkdir_recursive($backupDir, false);
        }
        // write cache file

        write_array_to_file('pruneDatabase', $queryString, $backupDir . '/' . $backupFile);
        return true;
    }
    return false;
}


///**
// * Job 4
// */

//function securityAudit() {
//	// do something
//	return true;
//}

function trimTracker()
{
    global $sugar_config, $timedate;
    $GLOBALS['log']->info('----->Scheduler fired job of type trimTracker()');
    $db = DBManagerFactory::getInstance();

    $admin = new Administration();
    $admin->retrieveSettings('tracker');
    require('modules/Trackers/config.php');
    $trackerConfig = $tracker_config;

    require_once('include/utils/db_utils.php');
    $prune_interval = ! empty($admin->settings['tracker_prune_interval']) ? $admin->settings['tracker_prune_interval'] : 30;
    foreach ($trackerConfig as $tableName => $tableConfig) {

        //Skip if table does not exist
        if (! $db->tableExists($tableName)) {
            continue;
        }

        $timeStamp = db_convert(
            "'" . $timedate->asDb($timedate->getNow()->get("-" . $prune_interval . " days")) . "'",
            "datetime"
        );
        if ($tableName == 'tracker_sessions') {
            $query = "DELETE FROM $tableName WHERE date_end < $timeStamp";
        } else {
            $query = "DELETE FROM $tableName WHERE date_modified < $timeStamp";
        }

        $GLOBALS['log']->info("----->Scheduler is about to trim the $tableName table by running the query $query");
        $db->query($query);
    } //foreach
    return true;
}

/* Job 5
 *
 */
function pollMonitoredInboxesForBouncedCampaignEmails()
{
    $GLOBALS['log']->info('----->Scheduler job of type pollMonitoredInboxesForBouncedCampaignEmails()');
    global $dictionary;


    $ie = new InboundEmail();
    $r  = $ie->db->query('SELECT id FROM inbound_email WHERE deleted=0 AND status=\'Active\' AND mailbox_type=\'bounce\'');

    while ($a = $ie->db->fetchByAssoc($r)) {
        $ieX = new InboundEmail();
        $ieX->retrieve($a['id']);
        $ieX->connectMailserver();
        $ieX->importMessages();
    }

    return true;
}


/**
 * Job 12
 */
function sendEmailReminders()
{
    $GLOBALS['log']->info('----->Scheduler fired job of type sendEmailReminders()');
    require_once("modules/Activities/EmailReminder.php");
    $reminder = new EmailReminder();
    return $reminder->process();
}

function removeDocumentsFromFS()
{
    $GLOBALS['log']->info('Starting removal of documents if they are not present in DB');

    /**
     * @var DBManager $db
     * @var SugarBean $bean
     */ global $db;

    // temp table to store id of files without memory leak
    $tableName = 'cron_remove_documents';

    $resource = $db->limitQuery("SELECT * FROM cron_remove_documents WHERE 1=1 ORDER BY date_modified ASC", 0, 100);
    $return   = true;
    while ($row = $db->fetchByAssoc($resource)) {
        $bean = BeanFactory::getBean($row['module']);
        $bean->retrieve($row['bean_id'], true, false);
        if (empty($bean->id)) {
            $isSuccess = true;
            $bean->id  = $row['bean_id'];
            $directory = $bean->deleteFileDirectory();
            if (! empty($directory) && is_dir('upload://deleted/' . $directory)) {
                if ($isSuccess = rmdir_recursive('upload://deleted/' . $directory)) {
                    $directory = explode('/', $directory);
                    while (! empty($directory)) {
                        $path = 'upload://deleted/' . implode('/', $directory);
                        if (is_dir($path)) {
                            $directoryIterator = new DirectoryIterator($path);
                            $empty             = true;
                            foreach ($directoryIterator as $item) {
                                if ($item->getFilename() == '.' || $item->getFilename() == '..') {
                                    continue;
                                }
                                $empty = false;
                                break;
                            }
                            if ($empty) {
                                rmdir($path);
                            }
                        }
                        array_pop($directory);
                    }
                }
            }
            if ($isSuccess) {
                $db->query('DELETE FROM ' . $tableName . ' WHERE id=' . $db->quoted($row['id']));
            } else {
                $return = false;
            }
        } else {
            $db->query('UPDATE ' . $tableName . ' SET date_modified=' . $db->convert(
                $db->quoted(TimeDate::getInstance()->nowDb()),
                'datetime'
            ) . ' WHERE id=' . $db->quoted($row['id']));
        }
    }

    return $return;
}


/**
 * + * Job 16
 * + * this will trim all records in sugarfeeds table that are older than 30 days or specified interval
 * + */

function trimSugarFeeds()
{
    global $sugar_config, $timedate;
    $GLOBALS['log']->info('----->Scheduler fired job of type trimSugarFeeds()');
    $db = DBManagerFactory::getInstance();

    //get the pruning interval from globals if it's specified
    $prune_interval = ! empty($GLOBALS['sugar_config']['sugarfeed_prune_interval']) && is_numeric($GLOBALS['sugar_config']['sugarfeed_prune_interval']) ? $GLOBALS['sugar_config']['sugarfeed_prune_interval'] : 30;


    //create and run the query to delete the records
    $timeStamp = $db->convert(
        "'" . $timedate->asDb($timedate->getNow()->get("-" . $prune_interval . " days")) . "'",
        "datetime"
    );
    $query     = "DELETE FROM sugarfeed WHERE date_modified < $timeStamp";


    $GLOBALS['log']->info("----->Scheduler is about to trim the sugarfeed table by running the query $query");
    $db->query($query);

    return true;
}


function cleanJobQueue($job)
{
    $td = TimeDate::getInstance();
    // soft delete all jobs that are older than cutoff
    $soft_cutoff = 7;
    if (isset($GLOBALS['sugar_config']['jobs']['soft_lifetime'])) {
        $soft_cutoff = $GLOBALS['sugar_config']['jobs']['soft_lifetime'];
    }
    $soft_cutoff_date = $job->db->quoted($td->getNow()->modify("- $soft_cutoff days")->asDb());
    $job->db->query("UPDATE {$job->table_name} SET deleted=1 WHERE status='done' AND date_modified < " . $job->db->convert(
        $soft_cutoff_date,
        'datetime'
    ));
    // hard delete all jobs that are older than hard cutoff
    $hard_cutoff = 21;
    if (isset($GLOBALS['sugar_config']['jobs']['hard_lifetime'])) {
        $hard_cutoff = $GLOBALS['sugar_config']['jobs']['hard_lifetime'];
    }
    $hard_cutoff_date = $job->db->quoted($td->getNow()->modify("- $hard_cutoff days")->asDb());
    $job->db->query("DELETE FROM {$job->table_name} WHERE status='done' AND date_modified < " . $job->db->convert(
        $hard_cutoff_date,
        'datetime'
    ));
    return true;
}

function pollMonitoredInboxesAOP()
{
    require_once 'modules/InboundEmail/AOPInboundEmail.php';
    $GLOBALS['log']->info('----->Scheduler fired job of type pollMonitoredInboxesAOP()');
    global $dictionary;
    global $app_strings;
    global $sugar_config;

    require_once('modules/Configurator/Configurator.php');
    require_once('modules/Emails/EmailUI.php');

    $ie      = new AOPInboundEmail();
    $emailUI = new EmailUI();
    $r       = $ie->db->query('SELECT id, name FROM inbound_email WHERE is_personal = 0 AND deleted=0 AND status=\'Active\' AND mailbox_type != \'bounce\'');
    $GLOBALS['log']->debug('Just got Result from get all Inbounds of Inbound Emails');

    while ($a = $ie->db->fetchByAssoc($r)) {
        $GLOBALS['log']->debug('In while loop of Inbound Emails');
        $ieX = new AOPInboundEmail();
        $ieX->retrieve($a['id']);
        $mailboxes = $ieX->mailboxarray;
        foreach ($mailboxes as $mbox) {
            $ieX->mailbox        = $mbox;
            $newMsgs             = array();
            $msgNoToUIDL         = array();
            $connectToMailServer = false;
            if ($ieX->isPop3Protocol()) {
                $msgNoToUIDL = $ieX->getPop3NewMessagesToDownloadForCron();
                // get all the keys which are msgnos;
                $newMsgs = array_keys($msgNoToUIDL);
            }
            if ($ieX->connectMailserver() == 'true') {
                $connectToMailServer = true;
            } // if

            $GLOBALS['log']->debug('Trying to connect to mailserver for [ ' . $a['name'] . ' ]');
            if ($connectToMailServer) {
                $GLOBALS['log']->debug('Connected to mailserver');
                if (! $ieX->isPop3Protocol()) {
                    $newMsgs = $ieX->getNewMessageIds();
                }
                if (is_array($newMsgs)) {
                    $current = 1;
                    $total   = count($newMsgs);
                    require_once("include/SugarFolders/SugarFolders.php");
                    $sugarFolder         = new SugarFolder();
                    $groupFolderId       = $ieX->groupfolder_id;
                    $isGroupFolderExists = false;
                    $users               = array();
                    if ($groupFolderId != null && $groupFolderId != "") {
                        $sugarFolder->retrieve($groupFolderId);
                        $isGroupFolderExists = true;
                    } // if
                    $messagesToDelete = array();
                    if ($ieX->isMailBoxTypeCreateCase()) {
                        require_once 'modules/AOP_Case_Updates/AOPAssignManager.php';
                        $assignManager = new AOPAssignManager($ieX);
                    }
                    foreach ($newMsgs as $k => $msgNo) {
                        $uid = $msgNo;
                        if ($ieX->isPop3Protocol()) {
                            $uid = $msgNoToUIDL[$msgNo];
                        } else {
                            $uid = imap_uid($ieX->conn, $msgNo);
                        } // else
                        if ($isGroupFolderExists) {
                            if ($ieX->importOneEmail($msgNo, $uid)) {
                                // add to folder
                                $sugarFolder->addBean($ieX->email);
                                if ($ieX->isPop3Protocol()) {
                                    $messagesToDelete[] = $msgNo;
                                } else {
                                    $messagesToDelete[] = $uid;
                                }
                                if ($ieX->isMailBoxTypeCreateCase()) {
                                    $userId = $assignManager->getNextAssignedUser();
                                    $GLOBALS['log']->debug('userId [ ' . $userId . ' ]');
                                    $ieX->handleCreateCase($ieX->email, $userId);
                                } // if
                            } // if
                        } else {
                            if ($ieX->isAutoImport()) {
                                $ieX->importOneEmail($msgNo, $uid);
                            } else {
                                /*If the group folder doesn't exist then download only those messages
                                 which has caseid in message*/

                                $ieX->getMessagesInEmailCache($msgNo, $uid);
                                $email                 = new Email();
                                $header                = imap_headerinfo($ieX->conn, $msgNo);
                                $email->name           = $ieX->handleMimeHeaderDecode($header->subject);
                                $email->from_addr      = $ieX->convertImapToSugarEmailAddress($header->from);
                                $email->reply_to_email = $ieX->convertImapToSugarEmailAddress($header->reply_to);
                                if (! empty($email->reply_to_email)) {
                                    $contactAddr = $email->reply_to_email;
                                } else {
                                    $contactAddr = $email->from_addr;
                                }
                                $mailBoxType = $ieX->mailbox_type;
                                $ieX->handleAutoresponse($email, $contactAddr);
                            } // else
                        } // else
                        $GLOBALS['log']->debug('***** On message [ ' . $current . ' of ' . $total . ' ] *****');
                        $current++;
                    } // foreach
                    // update Inbound Account with last robin

                } // if
                if ($isGroupFolderExists) {
                    $leaveMessagesOnMailServer = $ieX->get_stored_options("leaveMessagesOnMailServer", 0);
                    if (! $leaveMessagesOnMailServer) {
                        if ($ieX->isPop3Protocol()) {
                            $ieX->deleteMessageOnMailServerForPop3(implode(",", $messagesToDelete));
                        } else {
                            $ieX->deleteMessageOnMailServer(implode(
                                $app_strings['LBL_EMAIL_DELIMITER'],
                                $messagesToDelete
                            ));
                        }
                    }
                }
            } else {
                $GLOBALS['log']->fatal("SCHEDULERS: could not get an IMAP connection resource for ID [ {$a['id']} ]. Skipping mailbox [ {$a['name']} ].");
                // cn: bug 9171 - continue while
            } // else
        } // foreach
        imap_expunge($ieX->conn);
        imap_close($ieX->conn, CL_EXPUNGE);
    } // while
    return true;
}

/**
 * Scheduled job function to index any unindexed beans.
 *
 * @return bool
 */
function aodIndexUnindexed()
{
    $total       = 1;
    $sanityCount = 0;
    while ($total > 0) {
        $total = performLuceneIndexing();
        $sanityCount++;
        if ($sanityCount > 100) {
            return true;
        }
    }
    return true;
}

function aodOptimiseIndex()
{
    $index = BeanFactory::getBean("AOD_Index")->getIndex();
    $index->optimise();
    return true;
}


function performLuceneIndexing()
{
    global $db, $sugar_config;
    if (empty($sugar_config['aod']['enable_aod'])) {
        return;
    }
    $index = BeanFactory::getBean("AOD_Index")->getIndex();

    $beanList = $index->getIndexableModules();
    $total    = 0;
    foreach ($beanList as $beanModule => $beanName) {
        $bean = BeanFactory::getBean($beanModule);
        if (! $bean || ! method_exists($bean, "getTableName") || ! $bean->getTableName()) {
            continue;
        }
        $query = "SELECT b.id FROM " . $bean->getTableName() . " b LEFT JOIN aod_indexevent ie ON (ie.record_id = b.id AND ie.record_module = '" . $beanModule . "') WHERE b.deleted = 0 AND (ie.id IS NULL OR ie.date_modified < b.date_modified) ORDER BY b.date_modified ASC";
        $res   = $db->limitQuery($query, 0, 500);
        $c     = 0;
        while ($row = $db->fetchByAssoc($res)) {
            $suc = $index->index($beanModule, $row['id']);
            if ($suc) {
                $c++;
                $total++;
            }
        }
        if ($c) {
            $index->commit();
            $index->optimise();
        }
    }
    $index->optimise();
    return $total;
}

function aorRunScheduledReports()
{
    require_once 'include/SugarQueue/SugarJobQueue.php';
    $date = new DateTime(); //Ensure we check all schedules at the same instant
    foreach (BeanFactory::getBean('AOR_Scheduled_Reports')->get_full_list() as $scheduledReport) {

        if ($scheduledReport->status == 'active' && $scheduledReport->shouldRun($date)) {
            if (empty($scheduledReport->aor_report_id)) {
                continue;
            }
            $job                   = new SchedulersJob();
            $job->name             = "Scheduled report - {$scheduledReport->name} on {$date->format('c')}";
            $job->data             = $scheduledReport->id;
            $job->target           = "class::AORScheduledReportJob";
            $job->assigned_user_id = 1;
            $jq                    = new SugarJobQueue();
            $jq->submitJob($job);
        }
    }
    return true;
}

function processAOW_Workflow()
{
    require_once('modules/AOW_WorkFlow/AOW_WorkFlow.php');
    $workflow = new AOW_WorkFlow();
    return $workflow->run_flows();
}

function calcularEdadProspecto()
{
    $sql = "UPDATE leads_cstm INNER JOIN leads ON leads.id = leads_cstm.id_c SET edad_c = TIMESTAMPDIFF(YEAR,birthdate,CURDATE())";
    $db  = DBManagerFactory::getInstance();
    $res = $db->query($sql);

    return true;
}

function calcularAnosSinEstudiar()
{
    $sql = "UPDATE leads_cstm
              INNER JOIN leads ON leads.id = leads_cstm.id_c
              INNER JOIN (
                            SELECT MIN(TIMESTAMPDIFF(YEAR,fecha_fin,CURDATE())) AS anos  , veta_informacionacademica_leads_c.veta_informacionacademica_leadsleads_ida AS pid FROM veta_informacionacademica
                              INNER JOIN veta_informacionacademica_leads_c ON veta_informacionacademica_leads_c.veta_informacionacademica_leadsveta_informacionacademica_idb = veta_informacionacademica.id AND veta_informacionacademica_leads_c.deleted = 0
                            WHERE veta_informacionacademica.deleted = 0
                            GROUP BY pid
              )  AS q ON q.pid = leads.id
              SET anos_sin_estudiar_c = q.anos";

    $db  = DBManagerFactory::getInstance();
    $res = $db->query($sql);

    $sql = "UPDATE contacts_cstm
              INNER JOIN contacts ON contacts.id = contacts_cstm.id_c
              INNER JOIN (
                            SELECT MIN(TIMESTAMPDIFF(YEAR,fecha_fin,CURDATE())) AS anos, veta_informacionacademica_contacts_c.veta_informacionacademica_contactscontacts_ida AS cid FROM veta_informacionacademica
                              INNER JOIN veta_informacionacademica_contacts_c ON veta_informacionacademica_contacts_c.veta_informacionacademica_contactsveta_informacionacademica_idb = veta_informacionacademica.id AND veta_informacionacademica_contacts_c.deleted = 0
                            WHERE veta_informacionacademica.deleted = 0
                            GROUP BY cid
             )  AS q ON q.cid = contacts.id
            SET anos_sin_estudiar_c = q.anos";

    $db  = DBManagerFactory::getInstance();
    $res = $db->query($sql);

    return true;
}

function descartarProspecto()
{
    $sql = "UPDATE leads SET status = \"Descartado\" 
            WHERE id IN 
            (
              SELECT distinct parent_id FROM 
                (  
                  SELECT parent_id, COUNT(id) AS qty  FROM meetings WHERE parent_type = \"Leads\" AND deleted = 0 AND status = \"Not Held\" GROUP BY parent_id HAVING qty > 2
                ) AS t
            )";

    $db  = DBManagerFactory::getInstance();
    $res = $db->query($sql);

    return true;
}

function calcularEdadEstudiante()
{
    $sql = "UPDATE contacts_cstm INNER JOIN contacts ON contacts.id = contacts_cstm.id_c SET edad_c = TIMESTAMPDIFF(YEAR,birthdate,CURDATE())";
    $db  = DBManagerFactory::getInstance();
    $res = $db->query($sql);

    return true;
}

function prospecto_no_contactado()
{
    $t = new EmailTemplate();
    $t->retrieve('prospecto_no_contactado');

    $u = new User();
    $u->retrieve($t->assigned_user_id);

    $db    = DBManagerFactory::getInstance();
    $query = "SELECT DISTINCT id, first_name, last_name , DATEDIFF(CURDATE(), date_entered) as dias FROM leads
                WHERE id NOT IN
                (
                SELECT DISTINCT leads.id FROM leads
                INNER JOIN meetings_leads ON meetings_leads.lead_id = leads.id AND meetings_leads.deleted = 0
                INNER JOIN meetings ON meetings.id = meetings_leads.meeting_id AND meetings.deleted = 0 AND meetings.status = 'Held'
                WHERE leads.id IS NOT NULL AND leads.last_name IS NOT NULL AND leads.deleted = 0
                )
                AND DATEDIFF(CURDATE(), date_entered) > 3";

    $res  = $db->query($query);
    $list = array();

    while ($row = $db->fetchByAssoc($res)) {
        $l = new Lead();
        $l->retrieve($row['id']);
        $l->dias = $row['dias'];

        $list[$l->id] = $l;
    }

    if (count($list) > 0) {
        send_email_prospecto_no_encontrado($list, $t, $u);
    }
}

function send_email_prospecto_no_encontrado($list, $tEmail, $user)
{
    require_once('modules/Users/User.php');
    require_once('modules/EmailTemplates/EmailTemplate.php');
    require_once('modules/Administration/Administration.php');
    require_once('include/phpmailer/class.phpmailer.php');

    // Enviamos el email
    $admin = new Administration();
    $admin->retrieveSettings();
    $mail = new PHPMailer();  // Instantiate your new class

    if ($admin->settings['mail_sendtype'] == "SMTP") {
        $mail->IsSMTP();    // set mailer to use SMTP

        $mail->Host = $admin->settings['mail_smtpserver'];
        $mail->Port = $admin->settings['mail_smtpport'];

        if ($admin->settings['mail_smtpauth_req']) {
            $mail->SMTPAuth = true;
            $mail->Username = $admin->settings['mail_smtpuser'];
            $mail->Password = $admin->settings['mail_smtppass'];
        }


        $mail->Mailer        = "smtp";
        $mail->SMTPKeepAlive = true;
        $mail->From          = $admin->settings['notify_fromaddress'];
        $mail->FromName      = $admin->settings['notify_fromname'];
        //$mail->ContentType = "text/plain"; //"text/html"
        $mail->ContentType = "text/html";


        $mail->Subject = $tEmail->subject;

        $mail->Body = $tEmail->body_html;

        $msg = '<ul>';


        foreach ($list as $l) {
            $msg .= '<li>';
            $msg .= "<strong>$l->name</strong>, 	<strong>dias sin contactar:</strong> $l->dias";
            $msg .= '</li>';
        }

        $msg .= '</ul>';

        $msg = str_replace("$" . "prospectos", $msg, $tEmail->body_html);

        $msg = html_entity_decode($msg);

        $nbsp = html_entity_decode("&nbsp;");
        $msg  = str_replace($nbsp, " ", $msg);

        //$msg = str_replace("<p> </p>" , "<br>" , $msg);
        //$msg = str_replace(" " , "&nbsp;" , $msg);

        $mail->isHTML(true);
        $mail->Body = $msg;

        if ($admin->settings['mail_smtpssl'] == 1) {
            $mail->SMTPSecure = "ssl";
        } //  Used instead of TLS when only POP mail is selected

        if ($admin->settings['mail_smtpssl'] == 2) {
            $mail->SMTPSecure = "tls";
        } //  Used instead of TLS when only POP mail is selected

        $mail->Port = $admin->settings['mail_smtpport']; // Used instead of 587 when only POP mail is selected
        $mail->AddAddress($user->email1);
    } else {
        $mail->mailer = "sendmail";
    }

    $aux = $mail->Send();
    return true;
}


function alerta_loo()
{
    require_once('modules/Veta_Loo/Veta_Loo.php');

    $t = new EmailTemplate();
    $t->retrieve('alerta_loo');

    $u = new User();
    $u->retrieve($t->assigned_user_id);

    $db    = DBManagerFactory::getInstance();
    $query = "SELECT id, name, TIMESTAMPDIFF(HOUR, veta_loo.date_entered,CURDATE()) AS horas, fecha_recepcion FROM veta_loo
WHERE veta_loo.fecha_recepcion IS NULL or veta_loo.fecha_recepcion = '' AND deleted = 0 AND TIMESTAMPDIFF(HOUR, veta_loo.date_entered,CURDATE()) > 56";

    $res  = $db->query($query);
    $list = array();

    while ($row = $db->fetchByAssoc($res)) {
        $l = new Veta_Loo();
        $l->retrieve($row['id']);
        $l->horas = $row['horas'];

        $list[$l->id] = $l;
    }

    if (count($list) > 0) {
        send_email_alerta_loo($list, $t, $u);
    }
}

function send_email_alerta_loo($list, $tEmail, $user)
{
    require_once('modules/Users/User.php');
    require_once('modules/EmailTemplates/EmailTemplate.php');
    require_once('modules/Administration/Administration.php');
    require_once('include/phpmailer/class.phpmailer.php');
    require_once('modules/Veta_Loo/Veta_Loo.php');
    require_once('modules/Veta_Aplicacion/Veta_Aplicacion.php');

    // Enviamos el email
    $admin = new Administration();
    $admin->retrieveSettings();
    $mail = new PHPMailer();  // Instantiate your new class

    if ($admin->settings['mail_sendtype'] == "SMTP") {
        $mail->IsSMTP();    // set mailer to use SMTP

        $mail->Host = $admin->settings['mail_smtpserver'];
        $mail->Port = $admin->settings['mail_smtpport'];

        if ($admin->settings['mail_smtpauth_req']) {
            $mail->SMTPAuth = true;
            $mail->Username = $admin->settings['mail_smtpuser'];
            $mail->Password = $admin->settings['mail_smtppass'];
        }


        $mail->Mailer        = "smtp";
        $mail->SMTPKeepAlive = true;
        $mail->From          = $admin->settings['notify_fromaddress'];
        $mail->FromName      = $admin->settings['notify_fromname'];
        //$mail->ContentType = "text/plain"; //"text/html"
        $mail->ContentType = "text/html";


        $mail->Subject = $tEmail->subject;

        $mail->Body = $tEmail->body_html;

        $msg = '<ul>';


        foreach ($list as $l) {
            $a            = new Veta_Aplicacion();
            $aplicaciones = $l->get_linked_beans('veta_loo_veta_aplicacion', 'Veta_Aplicacion');

            foreach ($aplicaciones as $aplicacion) {
                $a = $aplicacion;
            }

            $msg .= '<li>';
            $msg .= "<strong>$l->name</strong>, 	<strong>horas sin respuesta:</strong> $l->horas <strong>Aplicacion</strong> " . $a->name;
            $msg .= '</li>';
        }

        $msg .= '</ul>';

        $msg = str_replace("$" . "loos", $msg, $tEmail->body_html);

        $msg = html_entity_decode($msg);

        $nbsp = html_entity_decode("&nbsp;");
        $msg  = str_replace($nbsp, " ", $msg);

        //$msg = str_replace("<p> </p>" , "<br>" , $msg);
        //$msg = str_replace(" " , "&nbsp;" , $msg);

        $mail->isHTML(true);
        $mail->Body = $msg;

        if ($admin->settings['mail_smtpssl'] == 1) {
            $mail->SMTPSecure = "ssl";
        } //  Used instead of TLS when only POP mail is selected

        if ($admin->settings['mail_smtpssl'] == 2) {
            $mail->SMTPSecure = "tls";
        } //  Used instead of TLS when only POP mail is selected

        $mail->Port = $admin->settings['mail_smtpport']; // Used instead of 587 when only POP mail is selected
        $mail->AddAddress($user->email1);
    } else {
        $mail->mailer = "sendmail";
    }

    $aux = $mail->Send();
    return true;
}

function calcularEdadConyuge()
{
    $sql = "UPDATE contacts_cstm INNER JOIN contacts ON contacts.id = contacts_cstm.id_c SET edad_conyuge_c = TIMESTAMPDIFF(YEAR,nacimiento_conyuge_c,CURDATE())";
    $db  = DBManagerFactory::getInstance();
    $res = $db->query($sql);

    $sql = "UPDATE leads_cstm INNER JOIN leads ON leads.id = leads_cstm.id_c SET edad_conyuge_c = TIMESTAMPDIFF(YEAR,nacimiento_conyuge_c,CURDATE())";
    $db  = DBManagerFactory::getInstance();
    $res = $db->query($sql);

    return true;
}

function calcularEdadHijos()
{
    $sql = "UPDATE veta_hijo SET edad = TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE())";
    $db  = DBManagerFactory::getInstance();
    $res = $db->query($sql);

    return true;
}

function establecer_perdida()
{
    $q   = "UPDATE opportunities SET sales_stage = 'Perdido' WHERE sales_stage NOT IN ('Perdido', 'Entrega_Australia') AND DATEDIFF(CURDATE(), date_modified) > 60";
    $db  = DBManagerFactory::getInstance();
    $res = $db->query($q);

    return true;
}

function actualizar_estado_cursos()
{

    $q   = "UPDATE veta_curso SET activo = 0 WHERE fecha_expiracion < now()";
    $db  = DBManagerFactory::getInstance();
    $res = $db->query($q);

    return true;
}

function actualizar_estado_requerimientos()
{
    require_once('modules/Veta_Requerimiento/Veta_Requerimiento.php');
    $requerimiento           = new Veta_Requerimiento();
    $requerimientos_vencidos = $requerimiento->getRequerimientosFechaExpiracionVencida(4);

    foreach ($requerimientos_vencidos as $req) {
        $req->estado      = 'Potencial';
        //$req->description = 'Estado cambiado por el planificador debido a que la fecha de expiracion de la visa del prospecto o estudiante es menor a 4 meses';
        $req->description = $req->description . ' <br>Status changed by planner due to prospect or client visa expiration date being less than 4 months';
        $req->save();
    }

    $requerimientos_vencidos = $requerimiento->getRequerimientosFechaViajeVencida(4);

    foreach ($requerimientos_vencidos as $req) {
        $req->estado      = 'Potencial';
        //$req->description = 'Estado cambiado por el planificador debido a que la fecha de viaje de la visa del prospecto o estudiante es menor a 4 meses';
        $req->description = $req->description . ' <br>Status changed by planner due to prospect or client visa travel date being less than 4 months';

        $req->save();
    }

    return true;
}


function execute_whatsapp_auto_msgs()
{
    logcron('execute_whatsapp_auto_msgs');
    whatsappMessager::execute();
    return true;
}

function getIntervalStr($originStr, $targetStr)
{

    if (empty($originStr)) return 0;
    $now = $targetStr ? strtotime($targetStr) : time();
    $your_date = strtotime($originStr);
    // var_dump($now, $your_date);

    $datediff = abs($now - $your_date);

    return round($datediff / (60 * 60 * 24));
}
function tiempos($opportunityRow)
{
    extract($opportunityRow);
    $opportunity = BeanFactory::getBean('Opportunities', $id);
    if (!$opportunity) {
        logerror("$id not found <br>");
        return null;
    }
    $visa = $opportunity->get_linked_beans('veta_visa_opportunities')[0];

    //creacion de proceso de ventas hasta que se pasa sc a visa
    $time_to_visa_c = getIntervalStr($opportunity->fetched_row['date_entered'], $date_created);
    $time_to_visa_applied_c = getIntervalStr($date_created, $visa ? $visa->fetched_row['fecha_aplicacion'] : null);

    if ((isset($opportunity->leads_opportunities_1_name)) and ($leads_opportunities_1_name != '')) {
        $time_to_checklist_sent_c = getIntervalStr($opportunity->fetched_row['date_entered'], $checklist_sent_date_c);
    }
    if ((isset($opportunity->company_name)) and ($opportunity->company_name != '')) {
        $time_to_checklist_company_c = getIntervalStr($opportunity->fetched_row['date_entered'], $company_checklist_sent_date_c);
    }

    $time_to_visa_granted_c = '0';

    if ($visa) {
        $time_to_visa_granted_c = $visa->fetched_row['fecha_aplicacion'] ? getIntervalStr($visa->fetched_row['fecha_aplicacion'], $visa->fetched_row['fecha_otorgada']) : '0';
    }

    return [$time_to_visa_c, $time_to_visa_applied_c, $time_to_visa_granted_c, $time_to_checklist_sent_c, $time_to_checklist_company_c];
}
function set_times()
{
    global $db;

    $query = "SELECT 
    o.id,
    sca.date_created, 
	oc.company_checklist_sent_date_c, oc.checklist_sent_date_c
    FROM vetacrm2.opportunities o
        JOIN opportunities_cstm oc ON oc.id_c = o.id
		JOIN veta_serviciocliente_opportunities_c sco ON sco.veta_serviciocliente_opportunitiesopportunities_ida = o.id
		LEFT JOIN (SELECT * FROM veta_serviciocliente_audit WHERE (parent_id,date_created) IN (
		SELECT parent_id,max(date_created) FROM veta_serviciocliente_audit WHERE after_value_string = 'Visa' group by parent_id
		) AND after_value_string = 'Visa') sca ON sca.parent_id = sco.veta_serviciocliente_opportunitiesveta_serviciocliente_idb
	WHERE name IN ('233','1501','1903','1888','1880','1858','1723','1635','1588','1586','1580','1560','1516','1482','1480','1471','1467','1461','1444','1433','1430','1416','1338','1341','1320','1318','1316','1280','1259','1198','1182','1154','1149','1094','1061','1032','1019','975','972','941','889','883','1010','1064','1104','1105','1107','1115','1148','1166','1168','1173','1174','1183','1184','1185','1189','1196','1233','1255','1264','1266','1290','1304','1349','1372','1374','1381','1386','1396','1403','1441','1449','1453','1464','1473','1476','1481','1486','1487','1490','1500','1503','1521','1523','1525','1526','1533','1537','1550','1572','1574','1584','1593','1597','1599','1607','1609','1616','1624','1625','1642','1643','1646','1653','1657','1659','1661','1675','1676','1681','1682','1687','1713','1715','1728','1737','1738','1739','1743','1756','1759','1760','1762','1765','1776','1779','1780','1785','1787','1788','1791','1796','1797','1799','1801','1802','1806','1807','1808','1811','1814','1818','1822','1823','1825','1826','1828','1829','1832','1835','1837','1838','1844','1846','1847','1848','1849','1850','1851','1853','1855','1859','1860','1861','1863','1864','1865','1867','1869','1873','1875','1876','1877','1878','1879','1881','1882','1883','1884','1886','1889','1891','1893','1894','1895','1896','1897','1898','1899','1900','1904','1905','1906','495','527','669','80','811','939','956','959','992','996')
	OR date_entered > '2024-08-15'";

    $res = $db->query($query);

    while ($opportunity = $db->fetchByAssoc($res)) {
        $opId = $opportunity['id'];
        [$time_to_visa_c, $time_to_visa_applied_c, $time_to_visa_granted_c, $time_to_checklist_sent_c, $time_to_checklist_company_c] = tiempos($opportunity);
        if ($time_to_visa_c) {
            $updateQuery = "UPDATE opportunities_cstm 
			SET time_to_visa_c= '$time_to_visa_c', 
			time_to_visa_applied_c = '$time_to_visa_applied_c', 
			time_to_visa_granted_c = '$time_to_visa_granted_c',
			time_to_checklist_sent_c = '$time_to_checklist_sent_c',
			time_to_checklist_company_c = '$time_to_checklist_company_c'
			WHERE id_c = '$opId';";
            $res = $db->query($updateQuery);
        }
    }

    return true;
}


function Update_Workflow_Info()
{

    //$GLOBALS['log']->error("UPDATE_WORKFLOW - ejecuto funcion2");
    $db = DBManagerFactory::getInstance();
    //$GLOBALS['log']->error("conteo_documentos - INICIO ");
    /*
    $query = 'select docsolicitados.name, opportunities.id as id_opportunidad ,docsolicitados.estadodocumento as estado_documento
    from doc_docssolicitados_opportunities_c as docopportunities
    right join (SELECT * FROM vetacrm2.doc_docssolicitados where DATE(date_modified) = DATE(NOW())) as docsolicitados
    on docopportunities.doc_docssolicitados_opportunitiesdoc_docssolicitados_idb = docsolicitados.id
    left join opportunities on opportunities.id = docopportunities.doc_docssolicitados_opportunitiesopportunities_ida
    group by opportunities.id, docsolicitados.name, opportunities.name,docsolicitados.estadodocumento
    ';
	*/

    $query = "select opportunities.id,
	leads_cstm.fecha_expiracion_visa_c,
    veta_requerimiento.current_visa_subclass,
	veta_requerimiento.ocupation,
	veta_requerimiento.consultation_fee,
	veta_requerimiento.profession,
	veta_requerimiento.current_job_position,
	veta_requerimiento.month_of_experience,
	veta_requerimiento.level_of_english,
	veta_requerimiento.nationality,
	veta_requerimiento.potential_visa_subclass,
	veta_requerimiento.migration_agent_name,
	veta_requerimiento.leap_id,
	veta_requerimiento.recluter_name,
	veta_requerimiento.secondary_aplicant_name,				
	veta_requerimiento.secondary_dob,
	veta_requerimiento.secondary_pasport_number,
	veta_requerimiento.dependent_name,
	veta_requerimiento.dependent_dob,
	veta_requerimiento.second_dependent_name,
	veta_requerimiento.second_dependent_dob,
	veta_requerimiento.third_dependent_name,
    
	nvc_companies.company_leap_id,    
	nvc_companies.phone_office as phone_company,    	
	nvc_companies.industry as industry_company,    
	
			
			
    
    nvc_companies_cstm.sbs_expectation_date_c,    
    nvc_companies_cstm.sbs_approval_date_c,
    nvc_companies_cstm.sbs_application_date_c,    
    nvc_companies.company_sbs_expiry_date,
    
    nvc_companies_cstm.tas_application_date_c,
    nvc_companies_cstm.tas_approval_date_c,
    nvc_companies_cstm.tas_expectation_date_c,
    nvc_companies_cstm.tas_expiration_date_c,    
    
    nvc_companies.name as company_name,
	
	nvc_companies_cstm.email_docs_portal_c,
	
	
	veta_requerimiento.referido AS REFERIDO,
	veta_requerimiento.fecha_viaje AS FECHAVIAJE,
	veta_requerimiento.id AS ID_REQUERIMIENTO,
	veta_requerimiento.name AS REQUERIMIENTO,		
	veta_requerimiento_cstm.visa_expire_secondary_applicant_date_c,	
	veta_requerimiento_cstm.visa_expire_2nd_dependent_date_c,
	veta_requerimiento_cstm.visa_expire_1st_dependent_date_c,		
	veta_requerimiento_cstm.third_dependent_dob_c,
	veta_requerimiento_cstm.visa_expire_3rd_dependent_date_c
	
	/*
	veta_requerimiento.nomination_app_exp_date,
	veta_requerimiento.nomination_app_date,
	veta_requerimiento_cstm.nomination_approval_date_c,
	veta_requerimiento.skill_assessment_app_exp_date,
	veta_requerimiento_cstm.labour_application_date_c,
	veta_requerimiento_cstm.labour_expectation_date_c,
	veta_requerimiento.skill_assessment_app_date,
	veta_requerimiento.visa_app_exp_date,
	veta_requerimiento_cstm.tbs_application_date_c,
	veta_requerimiento_cstm.tbs_expectation_date_c,
	veta_requerimiento_cstm.tbs_approval_date_c,
	*/
	
	
	from opportunities
    left join veta_recibo_opportunities_c on veta_recibo_opportunities_c.veta_recibo_opportunitiesopportunities_idb = opportunities.id
    left join veta_requerimiento_veta_recibo_c on veta_requerimiento_veta_recibo_c.veta_requerimiento_veta_reciboveta_recibo_idb = veta_recibo_opportunities_c.veta_recibo_opportunitiesveta_recibo_ida
    left join veta_requerimiento on veta_requerimiento.id = veta_requerimiento_veta_recibo_c.veta_requerimiento_veta_reciboveta_requerimiento_ida
	left join veta_requerimiento_cstm on veta_requerimiento_cstm.id_c = veta_requerimiento.id
    left join veta_requerimiento_leads_c on veta_requerimiento_leads_c.veta_requerimiento_leadsveta_requerimiento_idb = veta_requerimiento.id
    left join leads on leads.id = veta_requerimiento_leads_c.veta_requerimiento_leadsleads_ida
    left join leads_cstm on leads.id = leads_cstm.id_c
    left join nvc_companies_veta_requerimiento_1_c on nvc_companies_veta_requerimiento_1_c.nvc_companies_veta_requerimiento_1veta_requerimiento_idb = veta_requerimiento.id
	left join nvc_companies on nvc_companies.id = nvc_companies_veta_requerimiento_1_c.nvc_companies_veta_requerimiento_1nvc_companies_ida
    left join nvc_companies_cstm on nvc_companies.id = nvc_companies_cstm.id_c
    /* where opportunities.name = '233' */;";







    $queryDocumentos = "SELECT
		  id, 
		  a.requested_to_c,
		  sum(aprobados) as aprobados,
		  sum(cargados) as cargados, 
		  sum(pendientes) as pendientes,
		  sum(solicitados) as solicitados
		FROM
		(
		  SELECT
			o.id,
			dsc.requested_to_c,
			SUM(IF(ds.estadodocumento = 'Aprobado' AND dsc.internal_document_c <> 1, 1, 0)) as aprobados, 
			SUM(IF(ds.estadodocumento = 'Cargado' AND dsc.internal_document_c <> 1, 1, 0)) as cargados,
			COUNT(*) - SUM(IF(ds.estadodocumento = 'Aprobado' AND dsc.internal_document_c <> 1, 1, 0)) as pendientes,
			COUNT(*) as solicitados
		  FROM opportunities o
		  JOIN doc_docssolicitados_opportunities_c dso 
			ON dso.doc_docssolicitados_opportunitiesopportunities_ida = o.id
		  JOIN doc_docssolicitados ds 
			ON ds.id = dso.doc_docssolicitados_opportunitiesdoc_docssolicitados_idb
		  JOIN doc_docssolicitados_cstm dsc 
			ON dsc.id_c = ds.id
		  WHERE 
			ds.deleted = 0 AND 
			o.deleted = 0 AND
			dsc.internal_document_c <> 1
		  GROUP BY 
			o.id, dsc.requested_to_c

		  UNION
		  
		  SELECT
			o.id,
			dsc.requested_to_c, 
			SUM(IF(ds.estadodocumento = 'Aprobado' AND dsc.internal_document_c <> 1, 1, 0)) as aprobados,
			SUM(IF(ds.estadodocumento = 'Cargado' AND dsc.internal_document_c <> 1, 1, 0)) as cargados, 
			COUNT(*) - SUM(IF(ds.estadodocumento = 'Aprobado' AND dsc.internal_document_c <> 1, 1, 0)) as pendientes,
			COUNT(*) as solicitados
		  FROM opportunities o
		  JOIN doc_documentos_adic_opportunities_c dso
			ON dso.doc_documentos_adic_opportunitiesopportunities_idb = o.id
		  JOIN doc_documentos_adic ds 
			ON ds.id = dso.doc_documentos_adic_opportunitiesdoc_documentos_adic_ida
		  JOIN doc_documentos_adic_cstm dsc
			ON dsc.id_c = ds.id
		  WHERE
			ds.deleted = 0 AND 
			o.deleted = 0 AND
			dsc.internal_document_c <> 1
		  GROUP BY
			o.id, dsc.requested_to_c  
		) a
		/*
		WHERE
					a.id = '676980c4-c493-578a-8da0-64246887bf01'
		*/			
		GROUP BY
		  a.id, a.requested_to_c;";






    $queryClosingDate = "select id_c, fecha_cierre_c from opportunities_cstm where fecha_cierre_c = '' or fecha_cierre_c is null;";


    $result = $db->query($queryDocumentos, true, "Error obteniendo el visto bueno comercial del requerimiento");

    while ($row = $db->fetchByAssoc($result)) {
        //logerror($row);
        $o = new Opportunity();
        $o->retrieve($row['id']);

        switch ($row['requested_to_c']) {
            case 'Applicant':
                if ($o->applicant_requested_docs_c !== $row['solicitados']) {
                    $updatesOpportunitiesCstm[] = "applicant_requested_docs_c = '" . $db->quote($row['solicitados']) . "'";
                }
                if ($o->applicant_pending_docs_c !== $row['pendientes']) {
                    $updatesOpportunitiesCstm[] = "applicant_pending_docs_c = '" . $db->quote($row['pendientes']) . "'";
                }
                if ($o->applicant_uploaded_docs_c !== $row['cargados']) {
                    $updatesOpportunitiesCstm[] = "applicant_uploaded_docs_c = '" . $db->quote($row['cargados']) . "'";
                }
                if ($o->applicant_approved_docs_c !== $row['aprobados']) {
                    $updatesOpportunitiesCstm[] = "applicant_approved_docs_c = '" . $db->quote($row['aprobados']) . "'";
                }
                /*
				$GLOBALS['log']->error("conteo_documentos - solicitados ". $row['solicitados']);
				$GLOBALS['log']->error("conteo_documentos - pendientes " . $row['pendientes']);
				$GLOBALS['log']->error("conteo_documentos - cargados " . $row['cargados']);
				$GLOBALS['log']->error("conteo_documentos - aprobados " . $row['aprobados']);
				*/
                /*
				$focus->soel_docs_solicitados = $row['solicitados'] ? $row['solicitados'] : 0;
				$focus->soel_docs_pendientes = $row['pendientes'] ? $row['pendientes'] : 0;
				$focus->soel_docs_cargados = $row['cargados'] ? $row['cargados'] : 0;
				$focus->soel_docs_aprobados = $row['aprobados'] ? $row['aprobados'] : 0;
				*/
                break;
            case 'Company':
                if ($o->company_requested_docs_c !== $row['solicitados']) {
                    $updatesOpportunitiesCstm[] = "company_requested_docs_c = '" . $db->quote($row['solicitados']) . "'";
                }
                if ($o->company_pending_docs_c !== $row['pendientes']) {
                    $updatesOpportunitiesCstm[] = "company_pending_docs_c = '" . $db->quote($row['pendientes']) . "'";
                }
                if ($o->company_uploaded_docs_c !== $row['cargados']) {
                    $updatesOpportunitiesCstm[] = "company_uploaded_docs_c = '" . $db->quote($row['cargados']) . "'";
                }
                if ($o->company_approved_docs_c !== $row['aprobados']) {
                    $updatesOpportunitiesCstm[] = "company_approved_docs_c = '" . $db->quote($row['aprobados']) . "'";
                }
                /*
				$focus->company_requested_docs_c = $row['solicitados'] ? $row['solicitados'] : 0;
				$focus->company_pending_docs_c = $row['pendientes'] ? $row['pendientes'] : 0;
				$focus->company_uploaded_docs_c = $row['cargados'] ? $row['cargados'] : 0;
				$focus->company_approved_docs_c = $row['aprobados'] ? $row['aprobados'] : 0;
				*/
                break;
            default:
                break;
        }

        if (!empty($updatesOpportunitiesCstm)) {
            $updateSqlOpportunitiesCstm = "UPDATE opportunities_cstm SET " . implode(", ", $updatesOpportunitiesCstm) . " WHERE id_c = '" . $db->quote($row['id']) . "'";
            $db->query($updateSqlOpportunitiesCstm);
            //$GLOBALS['log']->error("UPDATE_WORKFLOW - query custom " . $updateSqlOpportunitiesCstm);
        }
    }


































    $res2 = $db->query($query);

    while ($row2 = $db->fetchByAssoc($res2)) {
        $o = new Opportunity();
        $o->retrieve($row2['id']);

        /*$GLOBALS['log']->error("UPDATE_WORKFLOW - entro al while con datos de proceso de ventas " . $o->name);
		$GLOBALS['log']->error("UPDATE_WORKFLOW - otro comentario");		
		*/

        // Iniciar la construcción del SQL UPDATE
        $updatesOpportunities = [];
        $updatesOpportunitiesCstm = [];

        if ($o->ocupation !== $row2['ocupation']) {
            $updatesOpportunities[] = "ocupation = '" . $db->quote($row2['ocupation']) . "'";
        }
        if ($o->current_visa_subclass !== $row2['current_visa_subclass']) {
            $updatesOpportunities[] = "current_visa_subclass = '" . $db->quote($row2['current_visa_subclass']) . "'";
        }
        if ($o->consultation_fee !== $row2['consultation_fee']) {
            $updatesOpportunities[] = "consultation_fee = '" . $db->quote($row2['consultation_fee']) . "'";
        }
        if ($o->profession !== $row2['profession']) {
            $updatesOpportunities[] = "profession = '" . $db->quote($row2['profession']) . "'";
        }
        if ($o->current_job_position !== $row2['current_job_position']) {
            $updatesOpportunities[] = "current_job_position = '" . $db->quote($row2['current_job_position']) . "'";
        }
        if ($o->month_of_experience !== $row2['month_of_experience']) {
            $updatesOpportunities[] = "month_of_experience = '" . $db->quote($row2['month_of_experience']) . "'";
        }
        if ($o->level_of_english !== $row2['level_of_english']) {
            $updatesOpportunities[] = "level_of_english = '" . $db->quote($row2['level_of_english']) . "'";
        }
        if ($o->nationality !== $row2['nationality']) {
            $updatesOpportunities[] = "nationality = '" . $db->quote($row2['nationality']) . "'";
        }
        if ($o->potential_visa_subclass !== $row2['potential_visa_subclass']) {
            $updatesOpportunities[] = "potential_visa_subclass = '" . $db->quote($row2['potential_visa_subclass']) . "'";
        }
        if ($o->migration_agent_name !== $row2['migration_agent_name']) {
            $updatesOpportunities[] = "migration_agent_name = '" . $db->quote($row2['migration_agent_name']) . "'";
        }
        if ($o->leap_id !== $row2['leap_id']) {
            $updatesOpportunities[] = "leap_id = '" . $db->quote($row2['leap_id']) . "'";
        }
        if ($o->recluter_name !== $row2['recluter_name']) {
            $updatesOpportunities[] = "recluter_name = '" . $db->quote($row2['recluter_name']) . "'";
        }
        if ($o->secondary_aplicant_name !== $row2['secondary_aplicant_name']) {
            $updatesOpportunities[] = "secondary_aplicant_name = '" . $db->quote($row2['secondary_aplicant_name']) . "'";
        }
        if ($o->secondary_dob !== $row2['secondary_dob'] && (isset($row2['secondary_dob']) && $row2['secondary_dob'] != '')) {
            $updatesOpportunities[] = "secondary_dob = '" . $db->quote($row2['secondary_dob']) . "'";
        }
        if ($o->secondary_pasport_number !== $row2['secondary_pasport_number']) {
            $updatesOpportunities[] = "secondary_pasport_number = '" . $db->quote($row2['secondary_pasport_number']) . "'";
        }
        if ($o->dependent_name !== $row2['dependent_name']) {
            $updatesOpportunities[] = "dependent_name = '" . $db->quote($row2['dependent_name']) . "'";
        }
        if ($o->dependent_dob !== $row2['dependent_dob'] && (isset($row2['dependent_dob']) && $row2['dependent_dob'] != '')) {
            $updatesOpportunities[] = "dependent_dob = '" . $db->quote($row2['dependent_dob']) . "'";
        }
        if ($o->second_dependent_name !== $row2['second_dependent_name']) {
            $updatesOpportunities[] = "second_dependent_name = '" . $db->quote($row2['second_dependent_name']) . "'";
        }
        if ($o->second_dependent_dob !== $row2['second_dependent_dob'] && (isset($row2['second_dependent_dob']) && $row2['second_dependent_dob'] != '')) {
            $updatesOpportunities[] = "second_dependent_dob = '" . $db->quote($row2['second_dependent_dob']) . "'";
        }
        if ($o->third_dependent_name !== $row2['third_dependent_name']) {
            $updatesOpportunities[] = "third_dependent_name = '" . $db->quote($row2['third_dependent_name']) . "'";
        }
        if ($o->company_leap_id_c !== $row2['company_leap_id']) {
            $updatesOpportunitiesCstm[] = "company_leap_id_c = '" . $db->quote($row2['company_leap_id']) . "'";
        }
        if ($o->virtual_sbs_approval_date_c !== $row2['sbs_approval_date_c'] && (isset($row2['sbs_approval_date_c']) && $row2['sbs_approval_date_c'] != '')) {
            $updatesOpportunitiesCstm[] = "virtual_sbs_approval_date_c = '" . $db->quote($row2['sbs_approval_date_c']) . "'";
        }
        if ($o->virtual_sbs_expectation_date_c !== $row2['sbs_expectation_date_c'] && (isset($row2['sbs_expectation_date_c']) && $row2['sbs_expectation_date_c'] != '')) {
            $updatesOpportunitiesCstm[] = "virtual_sbs_expectation_date_c = '" . $db->quote($row2['sbs_expectation_date_c']) . "'";
        }
        if ($o->company_sbs_expiry_date !== $row2['company_sbs_expiry_date'] && (isset($row2['company_sbs_expiry_date']) && $row2['company_sbs_expiry_date'] != '')) {
            $updatesOpportunities[] = "company_sbs_expiry_date = '" . $db->quote($row2['company_sbs_expiry_date']) . "'";
        }
        if ($o->company_name !== $row2['company_name']) {
            $updatesOpportunities[] = "company_name = '" . $db->quote($row2['company_name']) . "'";
        }
        if ($o->tas_application_date_c !== $row2['tas_application_date_c'] && (isset($row2['tas_application_date_c']) && $row2['tas_application_date_c'] != '')) {
            $updatesOpportunitiesCstm[] = "tas_application_date_c = '" . $db->quote($row2['tas_application_date_c']) . "'";
        }
        if ($o->tas_approval_date_c !== $row2['tas_expectation_date_c'] && (isset($row2['tas_expectation_date_c']) && $row2['tas_expectation_date_c'] != '')) {
            $updatesOpportunitiesCstm[] = "tas_expectation_date_c = '" . $db->quote($row2['tas_expectation_date_c']) . "'";
        }
        if ($o->tas_approval_date_c !== $row2['tas_approval_date_c'] && (isset($row2['tas_approval_date_c']) && $row2['tas_approval_date_c'] != '')) {
            $updatesOpportunitiesCstm[] = "tas_approval_date_c = '" . $db->quote($row2['tas_approval_date_c']) . "'";
        }
        if ($o->virtual_visa_expire_secondary_applicant_date_c !== $row2['visa_expire_secondary_applicant_date_c'] && (isset($row2['visa_expire_secondary_applicant_date_c']) && $row2['visa_expire_secondary_applicant_date_c'] != '')) {
            $updatesOpportunitiesCstm[] = "virtual_visa_expire_secondary_applicant_date_c = '" . $db->quote($row2['visa_expire_secondary_applicant_date_c']) . "'";
        }
        if ($o->visa_expire_secondary_applic_c !== $row2['visa_expire_secondary_applicant_date_c'] && (isset($row2['visa_expire_secondary_applicant_date_c']) && $row2['visa_expire_secondary_applicant_date_c'] != '')) {
            $updatesOpportunitiesCstm[] = "visa_expire_secondary_applic_c = '" . $db->quote($row2['visa_expire_secondary_applicant_date_c']) . "'";
        }
        if ($o->virtual_visa_expire_1st_dependent_date_c !== $row2['visa_expire_1st_dependent_date_c'] && (isset($row2['visa_expire_1st_dependent_date_c']) && $row2['visa_expire_1st_dependent_date_c'] != '')) {
            $updatesOpportunitiesCstm[] = "virtual_visa_expire_1st_dependent_date_c = '" . $db->quote($row2['visa_expire_dependant_1_c']) . "'";
        }
        if ($o->visa_expire_1st_dependent_da_c !== $row2['visa_expire_1st_dependent_date_c'] && (isset($row2['visa_expire_1st_dependent_date_c']) && $row2['visa_expire_1st_dependent_date_c'] != '')) {
            $updatesOpportunitiesCstm[] = "visa_expire_1st_dependent_da_c = '" . $db->quote($row2['visa_expire_dependant_1_c']) . "'";
        }
        if ($o->virtual_visa_expire_2nd_dependent_date_c !== $row2['visa_expire_2nd_dependent_date_c'] && (isset($row2['visa_expire_2nd_dependent_date_c']) && $row2['visa_expire_2nd_dependent_date_c'] != '')) {
            $updatesOpportunitiesCstm[] = "virtual_visa_expire_2nd_dependent_date_c = '" . $db->quote($row2['visa_expire_2nd_dependent_date_c']) . "'";
        }
        if ($o->visa_expire_2st_dependent_da_c !== $row2['visa_expire_2nd_dependent_date_c'] && (isset($row2['visa_expire_2nd_dependent_date_c']) && $row2['visa_expire_2nd_dependent_date_c'] != '')) {
            $updatesOpportunitiesCstm[] = "visa_expire_2st_dependent_da_c = '" . $db->quote($row2['visa_expire_2nd_dependent_date_c']) . "'";
        }
        if ($o->visa_expire_3st_dependent_da_c !== $row2['visa_expire_3rd_dependent_date_c'] && (isset($row2['visa_expire_3rd_dependent_date_c']) && $row2['visa_expire_3rd_dependent_date_c'] != '')) {
            $updatesOpportunitiesCstm[] = "visa_expire_3st_dependent_da_c = '" . $db->quote($row2['visa_expire_3rd_dependent_date_c']) . "'";
        }
        if ($o->virtual_visa_expire_3rd_dependent_date_c !== $row2['visa_expire_3rd_dependent_date_c'] && (isset($row2['visa_expire_3rd_dependent_date_c']) && $row2['visa_expire_3rd_dependent_date_c'] != '')) {
            $updatesOpportunitiesCstm[] = "virtual_visa_expire_3rd_dependent_date_c = '" . $db->quote($row2['visa_expire_3rd_dependent_date_c']) . "'";
        }
        if ($o->virtual_visa_exp_date_c !== $row2['fecha_expiracion_visa_c'] && (isset($row2['fecha_expiracion_visa_c']) && $row2['fecha_expiracion_visa_c'] != '')) {
            $updatesOpportunitiesCstm[] = "virtual_visa_exp_date_c = '" . $db->quote(substr($row2['fecha_expiracion_visa_c'], 0, 10)) . "'";
        }

        if ($o->email_docs_portal_c !== $row2['email_docs_portal_c'] && (isset($row2['email_docs_portal_c']) && $row2['email_docs_portal_c'] != '')) {
            $updatesOpportunitiesCstm[] = "email_docs_portal_c = '" . $db->quote($row2['email_docs_portal_c']) . "'";
        }





        if ($o->phone_company !== $row2['phone_company']) {
            $updatesOpportunities[] = "phone_company = '" . $db->quote($row2['phone_company']) . "'";
        }
        if ($o->company_industry !== $row2['industry_company']) {
            $updatesOpportunities[] = "company_industry = '" . $db->quote($row2['industry_company']) . "'";
        }


        //$GLOBALS['log']->error("conteo_documentos - esta afuera " . $o->name); 

        if ($o->name != '233') {
            $GLOBALS['log']->error("conteo_documentos - actualizo 233 cost agreement " . $o->name);
            $cost_agreements = '';
            /*
			$query_cost = "select 
				vc.name as name_MMM_fee, 
				vc.* 
				from veta_detallerecibo vc                         
					inner join veta_detallerecibo_veta_recibo_c vdvrc on vc.id = vdvrc.veta_detallerecibo_veta_reciboveta_detallerecibo_idb 
					inner join veta_recibo vr on vdvrc.veta_detallerecibo_veta_reciboveta_recibo_ida = vr.id 
					inner join veta_recibo_opportunities_c vroc on vr.id = vroc.veta_recibo_opportunitiesveta_recibo_ida 
				where vroc.veta_recibo_opportunitiesopportunities_idb =  '" . $o->id . "' 
				order by vc.intake asc 
				limit 1;";
			*/

            $query_cost = "select vc.name as name_MMM_fee from veta_detallerecibo vc inner join veta_detallerecibo_veta_recibo_c vdvrc on vc.id = vdvrc.veta_detallerecibo_veta_reciboveta_detallerecibo_idb inner join veta_recibo vr on vdvrc.veta_detallerecibo_veta_reciboveta_recibo_ida = vr.id inner join veta_recibo_opportunities_c vroc on vr.id = vroc.veta_recibo_opportunitiesveta_recibo_ida where vroc.veta_recibo_opportunitiesopportunities_idb = '$o->id' order by vc.intake asc limit 1";

            //$GLOBALS['log']->error("conteo_documentos - query 1 cost agreement ". $query_cost);

            $result3 = $db->query($query_cost, true, "Error obteniendo informacion asociado al proceso de venta " . $o->id);
            //$row3    = $db->fetchByAssoc($query_cost);

            while ($row3 = $db->fetchByAssoc($result3)) {
                //if ($row3 != null) {
                //$GLOBALS['log']->error("conteo_documentos - entro al while 1");
                $cost_agreements = $row3['name_MMM_fee'];
                //$o->cost_agrement_visa_subclass = $row3['name_MMM_fee'];
            }

            //$GLOBALS['log']->error("conteo_documentos - dato 1 cost agreement ". $cost_agreements);

            /*
			$query_cost = "select					
						c.name as college_name
						from veta_detallerecibo vc
						inner join veta_detallerecibo_veta_recibo_c vdvrc on vc.id = vdvrc.veta_detallerecibo_veta_reciboveta_detallerecibo_idb
						inner join veta_recibo vr on vdvrc.veta_detallerecibo_veta_reciboveta_recibo_ida = vr.id
						inner join veta_recibo_opportunities_c vroc on vr.id = vroc.veta_recibo_opportunitiesveta_recibo_ida
						join veta_curso_veta_college_1_c cc on cc.veta_curso_veta_college_1veta_curso_ida = vc.veta_curso_id_c
						join veta_college c on c.id = cc.veta_curso_veta_college_1veta_college_idb
						where vroc.veta_recibo_opportunitiesopportunities_idb = '" . $o->id . "' order by vc.intake asc";
			*/

            $query_cost = "select					
						c.name as college_name
						from veta_detallerecibo vc
						inner join veta_detallerecibo_veta_recibo_c vdvrc on vc.id = vdvrc.veta_detallerecibo_veta_reciboveta_detallerecibo_idb
						inner join veta_recibo vr on vdvrc.veta_detallerecibo_veta_reciboveta_recibo_ida = vr.id
						inner join veta_recibo_opportunities_c vroc on vr.id = vroc.veta_recibo_opportunitiesveta_recibo_ida
						join veta_curso_veta_college_1_c cc on cc.veta_curso_veta_college_1veta_curso_ida = vc.veta_curso_id_c
						join veta_college c on c.id = cc.veta_curso_veta_college_1veta_college_idb
						where vroc.veta_recibo_opportunitiesopportunities_idb = '$o->id' order by vc.intake asc";

            $result3 = $db->query($query_cost, true, "Error obteniendo informacion del comercial asociado al proceso de venta " . $o->id);

            while ($row3 = $db->fetchByAssoc($result3)) {
                $cost_agreements = $cost_agreements . " | " . $row3['college_name'];
                //$GLOBALS['log']->error("conteo_documentos - entro al while 2");
                //$o->cost_agrement_visa_subclass = $bean->cost_agrement_visa_subclass . "<br/>" . $row3['college_name'];
            }

            //$GLOBALS['log']->error("conteo_documentos - dato 2 cost agreement ". $cost_agreements);

            if ($o->cost_agrement_visa_subclass !== $row3['cost_agrement_visa_subclass']) {
                $updatesOpportunities[] = "cost_agrement_visa_subclass = '" . $cost_agreements . "'";
            }

            //$GLOBALS['log']->error("conteo_documentos - actualizo 233 cost agreement ". $o->name);
        }

        $department_fees = "SELECT 
			TRIM(BOTH '|' FROM CONCAT_WS('|',
				CASE WHEN vv1.name IS NOT NULL AND vv1.name != '' THEN vv1.name ELSE NULL END,
				CASE WHEN vv2.name IS NOT NULL AND vv2.name != '' THEN vv2.name ELSE NULL END,
				CASE WHEN vv3.name IS NOT NULL AND vv3.name != '' THEN vv3.name ELSE NULL END,
				CASE WHEN vv4.name IS NOT NULL AND vv4.name != '' THEN vv4.name ELSE NULL END,
				CASE WHEN vv5.name IS NOT NULL AND vv5.name != '' THEN vv5.name ELSE NULL END,
				CASE WHEN vv6.name IS NOT NULL AND vv6.name != '' THEN vv6.name ELSE NULL END,
				CASE WHEN vv7.name IS NOT NULL AND vv7.name != '' THEN vv7.name ELSE NULL END,
				CASE WHEN vv8.name IS NOT NULL AND vv8.name != '' THEN vv8.name ELSE NULL END,
				CASE WHEN vv9.name IS NOT NULL AND vv9.name != '' THEN vv9.name ELSE NULL END,
				CASE WHEN vv10.name IS NOT NULL AND vv10.name != '' THEN vv10.name ELSE NULL END,
				CASE WHEN vv11.name IS NOT NULL AND vv11.name != '' THEN vv11.name ELSE NULL END
			)) AS Department_fees
			
		FROM
			opportunities venta
			left join veta_recibo_opportunities_c on veta_recibo_opportunities_c.veta_recibo_opportunitiesopportunities_idb = venta.id
			left join veta_recibo_cstm as cuenta_cobro_cstm on veta_recibo_opportunities_c.veta_recibo_opportunitiesveta_recibo_ida = cuenta_cobro_cstm.id_c
			

			LEFT JOIN veta_tiposvisa vv1 ON cuenta_cobro_cstm.veta_tiposvisa_id1_c = vv1.id
			LEFT JOIN veta_tiposvisa vv2 ON cuenta_cobro_cstm.veta_tiposvisa_id2_c = vv2.id
			LEFT JOIN veta_tiposvisa vv3 ON cuenta_cobro_cstm.veta_tiposvisa_id3_c = vv3.id
			LEFT JOIN veta_tiposvisa vv4 ON cuenta_cobro_cstm.veta_tiposvisa_id4_c = vv4.id
			LEFT JOIN veta_tiposvisa vv5 ON cuenta_cobro_cstm.veta_tiposvisa_id5_c = vv5.id
			LEFT JOIN veta_tiposvisa vv6 ON cuenta_cobro_cstm.veta_tiposvisa_id6_c = vv6.id
			LEFT JOIN veta_tiposvisa vv7 ON cuenta_cobro_cstm.veta_tiposvisa_id7_c = vv7.id
			LEFT JOIN veta_tiposvisa vv8 ON cuenta_cobro_cstm.veta_tiposvisa_id8_c = vv8.id
			LEFT JOIN veta_tiposvisa vv9 ON cuenta_cobro_cstm.veta_tiposvisa_id9_c = vv9.id
			LEFT JOIN veta_tiposvisa vv10 ON cuenta_cobro_cstm.veta_tiposvisa_id10_c = vv10.id
			LEFT JOIN veta_tiposvisa vv11 ON cuenta_cobro_cstm.veta_tiposvisa_id11_c = vv11.id
			
			
		WHERE
			venta.id = '$o->id'
		";

        $result4 = $db->query($department_fees, true, "Error obteniendo informacion del comercial asociado al proceso de venta " . $o->id);

        while ($row4 = $db->fetchByAssoc($result4)) {
            $department_fees_resutl = $row4['Department_fees'];
            //$GLOBALS['log']->error("conteo_documentos - entro al while 2");
            //$o->cost_agrement_visa_subclass = $bean->cost_agrement_visa_subclass . "<br/>" . $row3['college_name'];
        }

        //$GLOBALS['log']->error("conteo_documentos - dato 2 cost agreement ". $cost_agreements);

        if ($o->department_fees_c !== $row4['department_fees_c'] && (isset($row4['department_fees_c']) && $row4['department_fees_c'] != '')) {
            $updatesOpportunitiesCstm[] = "department_fees_c = '" . $db->quote($row4['department_fees_c']) . "'";
        }








        //$GLOBALS['log']->error("UPDATE_WORKFLOW - VALIDO LOS CAMPOS");
        // Construye y ejecuta el UPDATE para 'opportunities' si hay campos para actualizar
        if (!empty($updatesOpportunities)) {
            $updateSqlOpportunities = "UPDATE opportunities SET " . implode(", ", $updatesOpportunities) . " WHERE id = '" . $db->quote($row2['id']) . "'";
            $db->query($updateSqlOpportunities);
            //$GLOBALS['log']->error("UPDATE_WORKFLOW - query normal " . $updateSqlOpportunities);
        }

        // Construye y ejecuta el UPDATE para 'opportunities_cstm' si hay campos para actualizar
        if (!empty($updatesOpportunitiesCstm)) {
            $updateSqlOpportunitiesCstm = "UPDATE opportunities_cstm SET " . implode(", ", $updatesOpportunitiesCstm) . " WHERE id_c = '" . $db->quote($row2['id']) . "'";
            $db->query($updateSqlOpportunitiesCstm);
            //$GLOBALS['log']->error("UPDATE_WORKFLOW - query custom " . $updateSqlOpportunitiesCstm);
        }
    }



    $result3 = $db->query($queryClosingDate, true, "Error obteniendo el visto bueno comercial del requerimiento");

    while ($row3 = $db->fetchByAssoc($result3)) {
        //logerror($row);
        $o = new Opportunity();
        $o->retrieve($row3['id_c']);



        //$GLOBALS['log']->error("conteo_documentos - FINALIZO EL PROCESO");
        //$GLOBALS['log']->error("closing_date - proceso ventas " . $o->name);
        //if($o->name == '1258'){
        $GLOBALS['log']->error("closing_date - proceso ventas " . $o->name);
        $GLOBALS['log']->error("closing_date - fecha " . $o->date_closed);


        if ((isset($o->closing_date_applicant_c)) and ($o->closing_date_applicant_c != '')) {
            $GLOBALS['log']->error("CLOSING - Existe closing date del aplicante " . $o->closing_date_applicant_c);

            $applicant_date = DateTime::createFromFormat('d/m/Y', $o->closing_date_applicant_c);
            $o->fecha_cierre_c = $applicant_date->format('Y-m-d');

            //$applicant_date = $o->closing_date_applicant_c;				
            //$o->fecha_cierre_c = $o->closing_date_applicant_c;
            //$o->fecha_cierre_c = $applicant_date;

            if ((isset($o->closing_date_company_c)) and ($o->closing_date_company_c != '')) {
                $company_date = DateTime::createFromFormat('d/m/Y', $o->closing_date_company_c);
                //$company_date = $o->closing_date_company_c;

                $GLOBALS['log']->error("closing_date - Existe closing date de la compañia " . $o->closing_date_company_c);

                if ($applicant_date > $company_date) {
                    $GLOBALS['log']->error("closing_date - El closing date de la compania es menor o igual que el del aplicante");
                    //$o->fecha_cierre_c = $o->closing_date_company_c;
                    $o->fecha_cierre_c = $company_date->format('Y-m-d');
                    //$o->fecha_cierre_c = $company_date;
                }
            }
        } else if ((isset($o->closing_date_company_c)) and ($o->closing_date_company_c != '')) {
            $GLOBALS['log']->error("closing_date - Existe closing date de compania " . $o->closing_date_company_c);
            $company_date = DateTime::createFromFormat('d/m/Y', $o->closing_date_company_c);
            $o->fecha_cierre_c = $company_date->format('Y-m-d');
            /*
				$company_date = $o->closing_date_company_c;
				$o->fecha_cierre_c = $company_date;
				*/
        }

        $db->query("UPDATE opportunities_cstm SET fecha_cierre_c = '$o->fecha_cierre_c' WHERE id_c = '" . $o->id . "'");
        $GLOBALS['log']->error("closing_date - UPDATE DONE");

        //}
    }





    return true;
}

/*
function convertToDatabaseDate($inputDatetime) {
	// Lista de formatos posibles de datetime
	$possibleFormats = ['d/m/Y H:i', 'd-m-Y H:i', 'm/d/Y H:i', 'm-d-Y H:i', 'Y-m-d H:i'];

	foreach ($possibleFormats as $format) {
		$date = DateTime::createFromFormat($format, $inputDatetime);
		if ($date && $date->format($format) === $inputDatetime) {
			return $date->format('Y-m-d'); // Extraemos solo la parte de la fecha
		}
	}

	// Si no se encuentra ningún formato válido, intentamos extraer solo la parte de la fecha
	$parts = explode(' ', $inputDatetime);
	if (count($parts) > 0) {
		return $parts[0];
	}

	// Si no podemos determinar el formato, devolvemos el datetime original
	return $inputDatetime;
}
*/
function visa_update()
{

    global $db;
    $datetime = (new DateTime())->format("Y-m-d h:i:s");
    $date = explode(' ', $datetime)[0];
    $query = "SELECT lo.leads_opportunities_1leads_ida as lid, lo.leads_opportunities_1opportunities_idb as oppid FROM veta_visa v 
		JOIN veta_visa_opportunities_c vo ON vo.veta_visa_opportunitiesveta_visa_idb = v.id
        JOIN leads_opportunities_1_c lo ON lo.leads_opportunities_1opportunities_idb = vo.veta_visa_opportunitiesopportunities_ida

		WHERE estado = 'Visa_Aplicada'
			AND date(fecha_aplicacion) <> curdate()
		 AND MOD(
				DATEDIFF(
					fecha_aplicacion,
					'$date'
				),
				30
			) = 0 AND date_entered > '2024-06-01'";

    $res = $db->query($query);
    $templateId = "f07ccdb9-cd51-0333-774b-65cd8bc1ef07";

    $send_date = new DateTime($datetime);
    $interval = DateInterval::createFromDateString("2 hour");
    $send_date->add($interval);
    while ($row = $db->fetchByAssoc($res)) {
        $opportunity = BeanFactory::getBean("Opportunities", $row['oppid']);

        $serviciocliente = $opportunity->get_linked_beans('veta_serviciocliente_opportunities')[0];

        $lead = BeanFactory::getBean("Leads", $row['lid']);

        $user = BeanFactory::getBean('Users', $serviciocliente->assigned_user_id);
        $tokens =  [
            '$lead' => $lead->full_name,
            '$leapid' => $lead->leap_id ? $lead->leap_id : $lead->full_name
        ];


        $recordatorio = new Auto_Recordatorio();
        $recordatorio->name = "Recordatorio LOO sin firma $opportunity->name";
        $recordatorio->lead_id_c = $lead->id;
        $recordatorio->type = 'Email';
        $recordatorio->send_date = $send_date->format("Y-m-d h") . ":00:00";
        $recordatorio->emailtemplate_id_c = $templateId;
        $recordatorio->tokens = json_encode($tokens, JSON_HEX_QUOT | JSON_HEX_TAG);
        $recordatorio->sent = 0;
        $recordatorio->user_id_c = $user->id;
        $recordatorio->parent_type = 'Opportunities';
        $recordatorio->parent_id = $opportunity->id;

        $recordatorio->save();
    }
}

function send_remainders()
{
    $recordatorios = new Auto_Recordatorio();
    $recordatorios->send_remainders();


    $hora = (new DateTime())->format("H");

    switch ($hora) {
        case 16:
            visa_update();
            break;

        default:
            break;
    }

    return true;
}

function semaforizacion()
{
    $s = new SemaforizacionUpdater();
    $s->run();
    return true;
}

function logcron(...$item)
{
    $debug_export = var_export($item, true);
    LoggerManager::getLogger()->error('[VETACRON] ' . $debug_export);
}


class whatsappMessager
{
    static function send_request($url, $data)
    {
        $additional_headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Cookie: PHPSESSID=crmsession'
        );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

        $server_output = curl_exec($ch);

        echo "<pre>";
        echo json_encode($data, JSON_PRETTY_PRINT);
        echo "\n";
        echo json_encode(json_decode($server_output), JSON_PRETTY_PRINT);
        echo "</pre>";

        try {
            $res = json_decode($server_output);
            if ($res->success)
                return $res->data;
            return [];
        } catch (Exception $e) {
            logerror($e);
            return [];
        }
    }

    static function executeRFI()
    {
        $query = "";
        return;
    }

    static function get_template($serviciocliente)
    {
        return [
            'mmmprod_sc_follow_up',
            'prod3_following4',
            'prod3_following5',
            'prod3_following6'
        ][rand(0, 3)];
    }

    static function mark_pending($serviciocliente)
    {
        $serviciocliente->wa_automatic_message_c = "HX35f117647574abe9692f730435f26cd4";
        $serviciocliente->save();
    }

    static function get_random_time($requerimiento)
    {
        $offset = 0;

        switch ($requerimiento->estado) {
            case 'Asignado':
            case 'Inmediato':
                $range = 2;
                break;
            case 'Potencial':
            default:
                $range = 7;
                break;
        }
    }

    static function send($serviciocliente)
    {
        $opportunity = $serviciocliente->obtener_oportunidad();
        $l = $opportunity->get_linked_beans('leads_opportunities_1');
        if (!count($l)) {
            logcron("$serviciocliente->name lead no encontrado");

            return;
        }
        $lead = $l[0];
        logcron("$serviciocliente->name $lead->full_name encontrado");

        $user = BeanFactory::getBean('Users',  $serviciocliente->assigned_user_id);

        $call = new Call();

        $call->name = "WhatsApp_$lead->phone_mobile";
        $call->direction = 'Outbound';
        $call->status = 'Planned';
        $call->date_start = new DateTime();
        $call->date_end = new DateTime();
        $call->description = "Hi $lead->full_name, I am $user->full_name, I am following up your case, could you please let me know if you have questions? Thank you";
        $call->parent_type = "Opportunities";
        $call->parent_id = $opportunity->id;
        $call->modified_user_id = $user->id;
        $call->created_by = $user->id;
        $call->assigned_user_id = $user->id;
        $call->save();
        logcron("$serviciocliente->name mensaje guardado");

        $serviciocliente->wa_automatic_message_c = '';
        $serviciocliente->save();
        logcron("$serviciocliente->name actualizado");

    }

    static function getLocalization()
    {
        $now = new DateTime(date("Y-m-d H:i:s"));

        $timeZones = [
            "America/Bogota" => "Offshore",
            "Australia/Sydney" => "Onshore",
        ];

        foreach ($timeZones as $timeZone => $localization) {
            $start = new DateTime(date("Y-m-d 10:00:00"), new DateTimeZone($timeZone));
            $end = new DateTime(date("Y-m-d 16:00:00"), new DateTimeZone($timeZone));
            if ($start < $now && $now < $end) {
                return $localization;
            }
        }
    }


    static function execute()
    {
        global $db;

        $query = "SELECT * 
        FROM veta_serviciocliente_cstm 
        WHERE wa_automatic_message_c IS NOT NULL 
        AND wa_automatic_message_c <>''
            LIMIT 10
            ";
        echo $query;
        $res = $db->query($query);

        while ($row = $db->fetchByAssoc($res)) {
            $serviciocliente = BeanFactory::getBean('Veta_ServicioCliente',  $row['id_c']);
            logcron("Enviando $serviciocliente->name");

            self::send($serviciocliente);
        }
    }
}



class SemaforizacionUpdater
{

    function run()
    {
        logcron("Corriendo semaforizacion");
        // $this->updateTickets();
        $this->updateNextContactDate();
        $this->updateDocuments();
        $this->updateSCNextContactDate();
        $this->updateAbonos();
        logcron("Termino semaforizacion");
    }

    function updateTickets()
    {

        $query = "SELECT 
			id AS module_id, 'Veta_Requerimiento' AS module_name
		FROM
			veta_requerimiento r
				LEFT JOIN
			veta_requerimiento_cstm rc ON rc.id_c = r.id
		WHERE
			(rc.estado_semaforizacion_c <> 'Rojo' OR rc.estado_semaforizacion_c is null)
				AND r.id IN (SELECT 
					ar.auto_tickets_veta_requerimientoveta_requerimiento_ida
				FROM
					auto_tickets_veta_requerimiento_c ar
						JOIN
					auto_tickets t ON t.id = ar.auto_tickets_veta_requerimientoauto_tickets_idb
				WHERE
					(t.date_sent < DATE_ADD(DATE(NOW()), INTERVAL - 2 DAY))
						AND (t.last_answered IS NULL
						OR t.last_answered < t.date_sent)) 
		UNION SELECT 
			id AS module_id, 'Opportunity' AS module_name
		FROM
			opportunities o
				LEFT JOIN
			opportunities_cstm oc ON oc.id_c = o.id
		WHERE
			(oc.estado_semaforizacion_c <> 'Rojo' OR oc.estado_semaforizacion_c is null)
				AND o.id IN (SELECT 
					ao.auto_tickets_opportunitiesopportunities_ida
				FROM
					auto_tickets_opportunities_c ao
						JOIN
					auto_tickets t ON t.id = ao.auto_tickets_opportunitiesauto_tickets_idb
				WHERE
					(t.date_sent < DATE_ADD(DATE(NOW()), INTERVAL - 2 DAY))
						AND (t.last_answered IS NULL
						OR t.last_answered < t.date_sent))";

        $db = DBManagerFactory::getInstance();
        $res = $db->query($query);
        while ($row = $db->fetchByAssoc($res)) {
            $this->actualizar_estado($row['module_name'], $row['module_id'], 'Rojo', 'ticket');
        }
    }

    function actualizar_estado($module, $id, $estado, $razon)
    {
        $bean = new $module();
        $bean->retrieve($id);
        $bean->estado_semaforizacion_c = 'Rojo';

        $detalle = (array) json_decode(htmlspecialchars_decode($this->detalle_semaforizacion_c));
        $table = $bean->get_custom_table_name();

        if (is_null($detalle))
            $detalle = [];
        $razonStr = "$razon" . "_" . "$id";
        $detalle[$razonStr] = true;

        $bean->detalle_semaforizacion_c = json_encode($detalle);

        $query = "UPDATE $table SET estado_semaforizacion_c = '$estado', detalle_semaforizacion_c = '$bean->detalle_semaforizacion_c' WHERE id_c = '$bean->id'";

        $db = DBManagerFactory::getInstance();
        $res = $db->query($query);
    }

    function actualizar_next_contact_date($module, $id, $days = 2)
    {
        $bean = new $module();
        $bean->retrieve($id);
        $table = $bean->get_custom_table_name();

        [$idField, $field, $table] = $module === 'Veta_Requerimiento' ? ['id', 'fecha_proximo_contacto', $bean->getTableName()] : ['id_c', 'fecha_proximo_contacto_c', $bean->get_custom_table_name()];

        $timestamp = strtotime(date('Y-m-d h:i:s'));

        $date = new \DateTime();
        $date->modify("+$days day");

        $next_contact_date =  $date->format('Y-m-d h:i:s');

        $query = "UPDATE $table SET $field = '$next_contact_date' WHERE $idField = '$bean->id'";

        $db = DBManagerFactory::getInstance();
        $res = $db->query($query);
    }

    function updateSCNextContactDate()
    {
        $query = "SELECT sc.id,scc.wa_automatic_message_c,sc.estado
				FROM veta_serviciocliente sc
				JOIN veta_serviciocliente_cstm scc ON scc.id_c = sc.id
				WHERE estado NOT IN ('SBS_And_Nomination_Checklist',
                        'SBS_Checklist_Sent',
                        'SBS_Process_Lodged',
                        'Completo',
                        'Descartado',
                        'Refund',
                        'Refund_Approved',
                        'Refund_Done',
                        'Hold',
                        'Hold_Process_Lodge',
                        'Closed',
                        'Visa_Otorgada')
				AND sc.date_modified < sc.fecha_proximo_contacto 
                AND DATE(sc.fecha_proximo_contacto) BETWEEN (DATE(NOW()) - INTERVAL 1 DAY) AND DATE(NOW())
				ORDER BY sc.fecha_proximo_contacto DESC
				LIMIT 1000";

        $db = DBManagerFactory::getInstance();
        $res = $db->query($query);

        while ($row = $db->fetchByAssoc($res)) {
            if (empty($row['wa_automatic_message_c'])) {
                $serviciocliente = BeanFactory::getBean("Veta_ServicioCliente", $row['id']);
                whatsappMessager::mark_pending($serviciocliente);
            }
        }
    }

    function updateNextContactDate()
    {
        $query = "SELECT r.id,rc.estado_semaforizacion_c,r.estado
				FROM veta_requerimiento r
				JOIN veta_requerimiento_cstm rc ON rc.id_c = r.id
				WHERE estado NOT IN ('Descartado','Active','Cerrado')
				AND r.date_modified < r.fecha_proximo_contacto AND DATE(NOW()) > DATE(r.fecha_proximo_contacto)
				ORDER BY r.fecha_proximo_contacto DESC
				LIMIT 1000";

        $db = DBManagerFactory::getInstance();
        $res = $db->query($query);

        while ($row = $db->fetchByAssoc($res)) {
            if ($row['estado_semaforizacion_c'] !== 'Rojo')
                $this->actualizar_estado('Veta_Requerimiento', $row['id'], 'Rojo', 'next');

            $this->actualizar_next_contact_date('Veta_Requerimiento', $row['id'], $row['estado'] == 'Potencial' ? 7 : 2);
        }
    }

    function updateDocuments()
    {

        $query = "SELECT o.id 
		FROM opportunities o
		LEFT JOIN opportunities_cstm oc ON oc.id_c = o.id
		JOIN doc_docssolicitados_opportunities_c dso on dso.doc_docssolicitados_opportunitiesopportunities_ida = o.id
		JOIN doc_docssolicitados ds on ds.id = dso.doc_docssolicitados_opportunitiesdoc_docssolicitados_idb
		WHERE ds.date_entered is not null 
		AND ds.estadodocumento NOT IN  ('Aprobado','Rechazado','Revising') 
		AND DATE(now()) < DATE_ADD(ds.date_entered, INTERVAL 2 DAY)
		AND (oc.estado_semaforizacion_c <> 'Rojo' OR oc.estado_semaforizacion_c is null)
		group by o.id;";

        $db = DBManagerFactory::getInstance();
        $res = $db->query($query);
        while ($row = $db->fetchByAssoc($res)) {
            $this->actualizar_estado('Opportunity', $row['id'], 'Rojo', 'documentos');
        }
    }

    function updateInmediatos()
    {
        $query = "SELECT r.id 
		FROM veta_requerimiento r
		LEFT JOIN veta_requerimiento_cstm rc ON rc.id_c = r.id
		WHERE (rc.estado_semaforizacion_c <> 'Rojo' OR rc.estado_semaforizacion_c is null) 
		AND r.estado = 'Inmediato' AND DATE(now()) > DATE_ADD( r.date_modified, INTERVAL 2 DAY)
		AND r.id not in (SELECT parent_id FROM notes n WHERE n.parent_type = 'Veta_Requerimiento' AND n.date_entered > DATE_ADD( r.date_modified, INTERVAL 2 DAY) );";

        $db = DBManagerFactory::getInstance();
        $res = $db->query($query);
        while ($row = $db->fetchByAssoc($res)) {
            $this->actualizar_estado('Veta_Requerimiento', $row['id'], 'Rojo', 'inmediato');
            $this->actualizar_next_contact_date('Veta_Requerimiento', $row['id'], 2);
        }
    }

    function updateAsignados()
    {
        $query = "SELECT r.id 
		FROM veta_requerimiento r
		LEFT JOIN veta_requerimiento_cstm rc ON rc.id_c = r.id
		WHERE (rc.estado_semaforizacion_c <> 'Rojo' OR rc.estado_semaforizacion_c is null) 
		AND r.estado = 'Asignado' AND DATE(now()) > DATE_ADD( r.date_modified, INTERVAL 2 DAY)
		AND r.id not in (SELECT parent_id FROM notes n WHERE n.parent_type = 'Veta_Requerimiento' AND n.date_entered > DATE_ADD( r.date_modified, INTERVAL 2 DAY) );";

        $db = DBManagerFactory::getInstance();
        $res = $db->query($query);
        while ($row = $db->fetchByAssoc($res)) {
            $this->actualizar_estado('Veta_Requerimiento', $row['id'], 'Rojo', 'asignado');
        }
    }

    function updatePotenciales()
    {

        $query = "SELECT r.id 
		FROM veta_requerimiento r
		LEFT JOIN veta_requerimiento_cstm rc ON rc.id_c = r.id
		WHERE (rc.estado_semaforizacion_c <> 'Rojo' OR rc.estado_semaforizacion_c is null) 
		AND r.estado = 'Potencial' AND DATE(now()) > DATE_ADD( r.date_modified, INTERVAL 7 DAY)
		AND r.id not in (SELECT parent_id FROM notes n WHERE n.parent_type = 'Veta_Requerimiento' AND n.date_entered > DATE_ADD( r.date_modified, INTERVAL 7 DAY) );";


        $db = DBManagerFactory::getInstance();
        $res = $db->query($query);
        while ($row = $db->fetchByAssoc($res)) {
            $this->actualizar_estado('Veta_Requerimiento', $row['id'], 'Rojo', 'potencial');
            $this->actualizar_next_contact_date('Veta_Requerimiento', $row['id'], 7);
        }
    }

    function updateAbonos()
    {
        $query = "SELECT o.name,a.date_entered
                    FROM opportunities o
                    JOIN veta_recibo_opportunities_c ro ON ro.veta_recibo_opportunitiesopportunities_idb = o.id
                    JOIN (
                        SELECT * FROM veta_abono_veta_recibo_c
                        WHERE (veta_abono_veta_reciboveta_recibo_ida,date_modified) IN (
                            SELECT ar.veta_abono_veta_reciboveta_recibo_ida,min(ar.date_modified) FROM veta_abono_veta_recibo_c ar
                            GROUP by ar.veta_abono_veta_reciboveta_recibo_ida)
                    ) _ar ON _ar.veta_abono_veta_reciboveta_recibo_ida = ro.veta_recibo_opportunitiesveta_recibo_ida
                    JOIN veta_abono a ON a.id = _ar.veta_abono_veta_reciboveta_abono_idb
                    LEFT JOIN notes n ON n.parent_id  = o.id AND n.parent_type = 'Opportunities' AND a.date_entered > n.date_entered
                    WHERE o.date_entered > '2024-11-07' AND curdate()  > DATE_ADD( date(a.date_entered) , INTERVAL 2 DAY) AND n.id IS NOT NULL";


        $db = DBManagerFactory::getInstance();
        $res = $db->query($query);
        while ($row = $db->fetchByAssoc($res)) {
            $this->actualizar_estado('Opportunity', $row['id'], 'Rojo', 'abono');
            // $this->actualizar_next_contact_date('Opportunity', $row['id'], 2);
        }
    }
}













class AORScheduledReportJob implements RunnableSchedulerJob
{
    public function setJob(SchedulersJob $job)
    {
        $this->job = $job;
    }

    public function run($data)
    {
        global $timedate;

        $bean   = BeanFactory::getBean('AOR_Scheduled_Reports', $data);
        $report = $bean->get_linked_beans('aor_report', 'AOR_Reports');
        if ($report) {
            $report = $report[0];
        } else {
            return false;
        }
        $html     = "<h1>{$report->name}</h1>" . $report->build_group_report();
        $html     .= <<<EOF
        <style>
        h1{
            color: black;
        }
        .list
        {
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;font-size: 12px;
            background: #fff;margin: 45px;width: 480px;border-collapse: collapse;text-align: left;
        }
        .list th
        {
            font-size: 14px;
            font-weight: normal;
            color: black;
            padding: 10px 8px;
            border-bottom: 2px solid black};
        }
        .list td
        {
            padding: 9px 8px 0px 8px;
        }
        </style>
EOF;
        $emailObj = new Email();
        $defaults = $emailObj->getSystemDefaultEmail();
        $mail     = new SugarPHPMailer();

        $mail->setMailerForSystem();
        $mail->IsHTML(true);
        $mail->From     = $defaults['email'];
        $mail->FromName = $defaults['name'];
        $mail->Subject  = from_html($bean->name);
        $mail->Body     = $html;
        $mail->prepForOutbound();
        $success = true;
        $emails  = $bean->get_email_recipients();
        foreach ($emails as $email_address) {
            $mail->ClearAddresses();
            $mail->AddAddress($email_address);
            $success = $mail->Send() && $success;
        }
        $bean->last_run = $timedate->getNow()->asDb(false);
        $bean->save();
        return true;
    }
}

if (file_exists('custom/modules/Schedulers/_AddJobsHere.php')) {
    require('custom/modules/Schedulers/_AddJobsHere.php');
}

if (file_exists('custom/modules/Schedulers/Ext/ScheduledTasks/scheduledtasks.ext.php')) {
    require('custom/modules/Schedulers/Ext/ScheduledTasks/scheduledtasks.ext.php');
}
