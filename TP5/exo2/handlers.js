let table;

async function init(users) {
  users = await users.json();

  table = new DataTable('#table', {
    columns: [
      {'data': 'id'},
      {'data': 'name'},
      {'data': 'email'},
      {'data': 'CRUD'}
    ],
    data: users,
    columnDefs: [
      {
        data: null,
        defaultContent: '<button class="changeButton">Edit</button><button class="removeButton">Delete</button>',
        targets: -1
      }
    ],
    drawCallback: function(){ addButtonsToRow(); }
  });

  // $('#table').dataTable({
  //   'drawCallback': function(){ addButtonsToRow(); }
  // });
}

function addButtonsToRow(){
  $('.removeButton').on('click', null, null,
    function(){
      fetch('http://localhost/~spinelli/TP4/api/index.php/'+$(this).parents('td').siblings().first().text(), { method: 'DELETE' });
      table.row($(this).parents('tr')).remove().draw();
    }
  );

  $('.changeButton').on('click', null, null,
    function(){
      $('#addStudentForm').attr('onsubmit', 'changeUser('+$(this).parents('td').siblings().first().text()+');');
      $('#inputNom').attr('value', $(this).parents('td').siblings().eq(1).text());
      $('#inputEmail').attr('value', $(this).parents('td').siblings().eq(2).text());
    }
  );
}

async function addUser() {
  // prevent the form to be sent to the server
  event.preventDefault();

  let newRow = {
    "name": $("#inputNom").val(),
    "email": $("#inputEmail").val()
  };

  if(newRow.name.length > 0){
    let id = await fetch('http://localhost/~spinelli/TP4/api/index.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(newRow)
    });

    newRow.id = (await id.text()).split(' ')[3];

    table.row.add(newRow).draw();
  }
}

async function changeUser(userId){
  event.preventDefault();

  let changedRow = {
    id: userId,
    name: $('#inputNom').val(),
    email: $('#inputEmail').val()
  }
  table.row.add(changedRow);
  table.row($('tbody').children().children().filter(":contains('"+userId+"')")).remove().draw();

  $('#addStudentForm').attr('onsubmit', 'addUser();');
  $('#inputNom').removeAttr('value');
  $('#inputNom').val('');
  $('#inputEmail').removeAttr('value');
  $('#inputEmail').val('');
}

fetch('http://localhost/~spinelli/TP4/api/index.php', {'method': 'GET'}).then((result) => init(result));
