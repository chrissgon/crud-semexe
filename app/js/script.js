const base = `${window.location.origin}/php/`;
const inputID = $("#id");
const alertContainer = $("#alerts");
const modalPerson = new bootstrap.Modal($("#modalPerson")[0]);
const modalDelete = new bootstrap.Modal($("#modalDelete")[0]);
let timeAlert = 0;

// GET
const getPerson = (id, handling) => {
  return $.get(base + "GetPerson.php", { PersonID: id }).done((person) => {
    handling(person);
  });
};

const getPersons = () => {
  $.get(base + "GetPersons.php")
    .done((json) => {
      const persons = JSON.parse(json);

      fillTable(persons);
    })
    .fail(() => {
      alertError("Ocorreu um erro ao carregar sua lista de contatos");
    });
};

// FILTER
const filterPerson = () => {
  filter = $("#formFilter").serialize();

  if (filter != "") {
    $.get(base + "FilterPersons.php", filter)
      .done((json) => {
        const persons = JSON.parse(json);

        fillTable(persons);
      })
      .fail(() => {
        alertError("Ocorreu um erro ao filtrar sua lista de contatos");
      });
  } else {
    getPersons();
  }
};

$("#search").keyup(function () {
  filterPerson();
});

const fillTable = (data) => {
  $(".table-body").html("");
  $("#records").html(data.records);

  data.persons.forEach((person) => {
    $(".table-body").append(`
      <tr>
        <td class="actions" align="right">
          <button 
          onclick="initFormUpdate(${person.PersonID})"
          type="button" 
          class="btn btn-outline-warning" 
          data-bs-toggle="modal"
          data-bs-target="#modalPerson">Editar</button>

          <button 
          onclick="initFormDelete(${person.PersonID})" 
          type="button"
          class="btn btn-outline-danger"
          data-bs-toggle="modal"
          data-bs-target="#modalDelete">Excluir</button>

        </td>
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
      </tr>
      `);
  });

  if (data.records == 0) {
    $(".table-body").append(`
      <tr>
        <td align="center" colspan="11">
          Nenhum contato cadastrado
        </td>
      </tr>
    `);
  }
};

// SUBMIT
$("#formPerson").submit(function (e) {
  e.preventDefault();

  if (validFields()) {
    person = getFields();

    if (isCreate()) {
      createPerson(person);
      return;
    }

    updatePerson(person);
  }
});

$("#formDelete").submit(function (e) {
  e.preventDefault();

  const person = $("#formDelete").serialize();

  deletePerson(person);
});

const isCreate = () => {
  return inputID.val().length == "";
};

// CREATE
const createPerson = (person) => {
  $.post(base + "CreatePerson.php", person)
    .done(() => {
      getPersons();
      alertSuccess("Contato cadastrado com sucesso");
      modalPerson.hide();
    })
    .fail(() => {
      alertError("Ocorreu um erro ao cadastrar");
    });
};

const initFormCreate = () => {
  resetForm();
  changeBodyScroll();
  $("#formPerson .modal-title").html("Criação");
  $("#formPerson .submit").html("Criar");
  inputID.val("");
};

// UPDATE
const updatePerson = (person) => {
  $.post(base + "UpdatePerson.php", person)
    .done(() => {
      getPersons();
      alertSuccess("Contato editado com sucesso");
      modalPerson.hide();
    })
    .fail(() => {
      alertError("Ocorreu um erro ao editar");
    });
};

const initFormUpdate = async (id) => {
  resetForm();
  changeBodyScroll();

  $("#formPerson .modal-title").html("Edição");
  $("#formPerson .submit").html("Editar");
  masks();

  await getPerson(id, (json) => {
    const person = JSON.parse(json);
    fillFormUpdate(person);
  });
};

const fillFormUpdate = (person) => {
  $("#id").val(person.PersonID);
  $("#name").val(person.Name);
  $("#cpf").val(person.CPF);
  $("#email").val(person.Email);
  $("#phone").val(person.Phone);
  $("#zipcode").val(person.Zipcode);
  $("#address").val(person.Address);
  $("#number").val(person.Number);
  $("#complement").val(person.Complement);
  $("#city").val(person.City);
  $("#state").val(person.State);
};

// DELETE

const deletePerson = (person) => {
  $.post(base + "DeletePerson.php", person)
    .done(() => {
      getPersons();
      alertSuccess("Contato excluído com sucesso");
      modalDelete.hide();
    })
    .fail(() => {
      alertError("Ocorreu um erro ao excluir");
    });
};

const initFormDelete = (id) => {
  $("#idDelete").val(id);
};

// ALERTS
const alertError = (text) => {
  showAlert();
  $("#alertError .text").html(text);
  $("#alertError").removeClass("fade");
};

const alertSuccess = (text) => {
  showAlert();
  $("#alertSuccess .text").html(text);
  $("#alertSuccess").removeClass("fade");
};

const showAlert = () => {
  clearTimeout(timeAlert);

  $(".alert", alertContainer).addClass("fade");
  alertContainer.addClass("show");

  timeAlert = setTimeout(() => {
    dimissAlert();
  }, 2000);
};

const dimissAlert = () => {
  alertContainer.removeClass("show");
};

$(alertContainer).click(function () {
  dimissAlert();
});

// GENERICS
const resetForm = () => {
  $("#name").val("");
  $("#cpf").val("");
  $("#email").val("");
  $("#phone").val("");
  $("#zipcode").val("");
  $("#address").val("");
  $("#number").val("");
  $("#complement").val("");
  $("#city").val("");
  $("#state").val("");

  $("input, select", "#formPerson .input-group").removeClass("is-invalid");
};

const getFields = () => {
  return $("#formPerson").serialize();
};

const validFields = () => {
  let valid = true;
  const cpf = $("#cpf");

  $("#formPerson .input-group").each(function () {
    const input = $("input, select", this);
    const value = $("input, select", this).val();

    if (value == null || value == "" || value.length == 0) {
      input.addClass("is-invalid");
      valid = false;
    } else {
      input.removeClass("is-invalid");
    }
  });

  if (!validCPF(cpf.val())) {
    cpf.addClass("is-invalid");
    return false;
  }

  cpf.removeClass("is-invalid");

  return valid;
};

$(document).ready(function () {
  getPersons();
  masks();
});

const changeBodyScroll = () => {
  $("html, body").toggleClass("no-scroll");
};

$("#modalPerson").bind("hidden.bs.modal", function () {
  changeBodyScroll();
});

// MASKS
const masks = () => {
  $("#cpf").mask("000.000.000-00");
  $("#zipcode").mask("00000-000");
  $("#phone").mask("(00) 00000-0000");
};

// VALIDATIONS
function validCPF(cpf) {
  cpf = cpf.replace(/\D/g, "");
  if (cpf.toString().length != 11 || /^(\d)\1{10}$/.test(cpf)) return false;
  var result = true;
  [9, 10].forEach(function (j) {
    var soma = 0,
      r;
    cpf
      .split(/(?=)/)
      .splice(0, j)
      .forEach(function (e, i) {
        soma += parseInt(e) * (j + 2 - (i + 1));
      });
    r = soma % 11;
    r = r < 2 ? 0 : 11 - r;
    if (r != cpf.substring(j, j + 1)) result = false;
  });
  return result;
}
