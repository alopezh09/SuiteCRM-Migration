<?php

require_once 'include/MVC/View/views/view.edit.php';

class Veta_VisaViewEdit extends ViewEdit
{
    public function display()
    {
        parent::display();
        
		echo <<<EOT
<script type="text/javascript">
  function convertMultiSelectToCheckboxes() {
  const multiSelectElement = document.getElementById("process_stages_c");

  if (multiSelectElement) {
    const parentDiv = multiSelectElement.parentElement;
    const options = multiSelectElement.options;
    const table = document.createElement("table");
    table.id = "process_stages_c_table";
    parentDiv.appendChild(table);

    let row1 = document.createElement("tr");
    let row2 = document.createElement("tr");
    table.appendChild(row1);
    table.appendChild(row2);

    for (let i = 0; i < options.length; i++) {
      const option = options[i];
      const cell1 = document.createElement("td");
      const cell2 = document.createElement("td");
      const checkbox = document.createElement("input");
      const label = document.createElement("label");

      checkbox.type = "checkbox";
      checkbox.name = "process_stages_c_checkboxes[]";
      checkbox.value = option.value;
      checkbox.checked = option.selected;
      label.innerHTML = option.text;
      label.htmlFor = option.value;

      row1.appendChild(cell1);
      row2.appendChild(cell2);
      cell1.appendChild(checkbox);
      cell2.appendChild(label);

      checkbox.addEventListener("change", function (event) {
        const optionIndex = Array.from(options).findIndex(
          (opt) => opt.value === event.target.value
        );
        options[optionIndex].selected = event.target.checked;
      });

      // Crear una nueva fila después de cada sexto elemento
      if ((i + 1) % 6 === 0) {
        row1 = document.createElement("tr");
        row2 = document.createElement("tr");
        table.appendChild(row1);
        table.appendChild(row2);
      }
    }

    multiSelectElement.style.display = "none";
  }
}

document.addEventListener("DOMContentLoaded", convertMultiSelectToCheckboxes);



</script>

<style>
  #process_stages_c_table {
  border-collapse: separate;
  border-spacing: 10px 5px;
}

#process_stages_c_table td {
  text-align: center;
  vertical-align: middle;
}

</style>
EOT;
    }
}
