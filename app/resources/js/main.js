const firstname = document.getElementById("txtfirstname");
const lastname = document.getElementById("txtlastname");

$("#btnOnSave").click(() => {
  let obj = {
    firstname: firstname.value,
    lastname: lastname.value,
    isbool: true,
  };
  sendPostRequest(obj).then((response) => {
    console.log(response);
  });
});

const sendPostRequest = (object) => {
  const response = new Promise((resolve) => {
    $.post("app/helper/helper.php", object, (repository) => {
      return resolve(repository);
    });
  });
  return response;
};
