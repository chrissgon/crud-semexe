const base = `${window.location.origin}/php/`;
const inputID = $("#id");

// GET
const getPerson = () => {
  $.get(base + "GetPersons.php").done(function (json) {
    const person = JSON.parse(json);

    fillTable(person);
  });
};

const fillTable = (data) => {
  $(".table-body").html();
  $("#records").html(data.persons.length);

  data.persons.forEach((person) => {
    $(".table-body").append(`
      <tr>
        <td>${person.Name}</td>
        <td>${person.CPF}</td>
        <td>${person.Email}</td>
        <td>${person.Phone}</td>
        <td>${person.Zipcode}</td>
        <td>${person.Address}</td>
        <td>${person.Number}</td>
        <td>${person.Complement}</td>
        <td>${person.City}</td>
        <td>${person.State}</td>
        <td align="right">
            <button 
            onclick="initFormUpdate(${person.PersonID})"
            type="button" 
            class="btn btn-outline-warning" 
            data-bs-toggle="modal" data-bs-target="#modalPerson">Editar</button>

            <button data-id="${person.PersonID}" type="button" class="btn btn-outline-danger">Excluir</button>
        </td>
      </tr>
      `);
  });
};

// SUBMIT
$("#formPerson").submit(function (e) {
  e.preventDefault();

  person = getFields();

  if (isCreate()) {
    createPerson(person);
    return;
  }

  updatePerson(person);
});

const isCreate = () => {
  return inputID.val().length == "";
};

// CREATE
const createPerson = (person) => {
  $.post(base + "CreatePerson.php", person).done(function (json) {
    console.log(json);
  });
};

// UPDATE
const updatePerson = (person) => {};

// GENERICS
const getFields = () => {
  return $("#formPerson").serialize();
};

const validFields = () => {};

const initFormCreate = () => {
  $("#formPerson .submit").html("Criar");
  inputID.val("");
};

const initFormUpdate = (id) => {
  $("#formPerson .submit").html("Editar");
  inputID.val(id);
};

$(document).ready(function () {
  getPerson();
});
