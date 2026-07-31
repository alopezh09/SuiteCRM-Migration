<div style="font-size: 13pt;font-weight: 800;border-top: 1px solid #4e4e4e;">{$subclass} {$visa_type}</div>

<div>
    {if $q_1 }
        <div>
            <b>{$LBL_Q_1}:</b> <span>{$q_1}<span>
        </div>
        {if $q_1 != 'None' }
            <div style="display:flex; max-width:500px">
                <b>{$LBL_Q_1_1}:</b> <span style="margin-right:auto">{$q_1_1|number_format:2}</span>
                <b>{$LBL_Q_1_2}:</b> <span>{$q_1_2|number_format:2}</span>
            </div>
            <div style="display:flex; max-width:500px">
                <b>{$LBL_Q_1_3}:</b> <span style="margin-right:auto">{$q_1_3|number_format:2}</span>
                <b>{$LBL_Q_1_4}:</b> <span>{$q_1_4|number_format:2}</span>
            </div>
        {/if}
        <br>
    {/if}
    {if $q_7 }
        <div>
            <b>{$LBL_Q_7}:</b> <span>{$q_7}<span>
        </div>
        {if $q_7 != 'no' }
            <div>
                <b>{$LBL_Q_7_1}:</b> <span>{$q_7_1}</span>
            </div>
        {/if}
        <br>
    {/if}
    {if $q_8 }
        <div>
            <b>{$LBL_Q_8}:</b> <span>{$q_8}<span>
        </div>
        {if $q_8 != 'no' }
            <div>
                <b>{$LBL_Q_8_1}:</b> <span>{$q_8_1}</span>
            </div>
        {/if}
        <br>
    {/if}


    {if $q_3 }
        <div>
            <b>{$LBL_Q_3}:</b> <span>{$q_3}<span>
        </div>
        <br>
    {/if}


    {if $q_2 }
        <div>
            <b>{$LBL_Q_2}:</b> <span>{$q_2}<span>
        </div>
        <br>
    {/if}
    {if $q_5 }
        <div>
            <b>{$LBL_Q_5}:</b> <span>{$q_5|number_format}<span>
        </div>
        <br>
    {/if}
    {if $q_6 }
        <div>
            <b>{$LBL_Q_6}:</b> <span>{$q_6}<span>
        </div>
        <br>
    {/if}
    {if $q_11 }
        <div>
            <b>{$LBL_Q_11}:</b> <span>{$q_11}<span>
        </div>
        <br>
    {/if}
    {if $q_17}
        <div>
            <b>{$LBL_Q_17}:</b> <span>{$q_17}<span>
        </div>
        <br>
    {/if}


    {if $q_19 }
        <div>
            <b>{$LBL_Q_19}:</b> <span>{$q_19}<span>
        </div>
        {if $q_19 != 'no' }
            <div>
                <b>{$LBL_Q_19_1}:</b> <span>{$q_19_1}</span>
            </div>
        {/if}
        <br>
    {/if}
</div>

<div>
    {if $q_9 }
        <div>
            <b>{$LBL_Q_9}:</b> <span>{$q_9}<span>
        </div>
        {if $q_9 != 'no' }
            <div>
                <b>{$LBL_Q_9_1}:</b> <span>{$q_9_1}</span>
            </div>
        {/if}
        <br>
    {/if}


    {if $q_12}
        <div>
            <b>{$LBL_Q_12}:</b> <span>{$q_12}<span>
        </div>
        <br>
    {/if}
    {if $q_13}
        <div>
            <b>{$LBL_Q_13}:</b> <span>{$q_13}<span>
        </div>
        <br>
    {/if}
    {if $q_14}
        <div>
            <b>{$LBL_Q_14}:</b> <span>{$q_14|number_format:2}<span>
        </div>
        <br>
    {/if}
    {if $q_15}
        <div>
            <b>{$LBL_Q_15}:</b> <span>{$q_15}<span>
        </div>
        <br>
    {/if}
    {if $q_10}
        <div>
            <b>{$LBL_Q_10}:</b> <span>{$q_10|number_format}<span>
        </div>
        <br>
    {/if}
    {if $q_18}
        <div>
            <b>{$LBL_Q_18}:</b> <span>{$q_18}<span>
        </div>
        <br>
    {/if}
</div>

<div>
    {if $q_20 }
        <div>
            <b>{$LBL_Q_20}:</b> <span>{$q_20}<span>
        </div>
        {if $q_20 != 'no' }
            <div>
                <b>{$LBL_Q_20_1}:</b> <span>{$q_20_1}</span>
            </div>
        {/if}
        <br>
    {/if}

    {if $q_22}
        <div>
            <b>{$LBL_Q_22}:</b> <span>{$q_22}<span>
        </div>
        <br>
    {/if}
    {if $q_23}
        <div>
            <b>{$LBL_Q_23}:</b> <span>{$q_23}<span>
        </div>
        <br>
    {/if}
    {if $q_24}
        <div>
            <b>{$LBL_Q_24}:</b> <span>{$q_24|number_format}<span>
        </div>
        <br>
    {/if}
    {if $q_25}
        <div>
            <b>{$LBL_Q_25}:</b> <span>{$q_25}<span>
        </div>
        <br>
    {/if}
</div>
<div>
    {if $description}
        <div>
            <b>{$LBL_DESCRIPTION}:</b> <span>{$description}<span>
        </div>
        <br>
    {/if}
</div>
