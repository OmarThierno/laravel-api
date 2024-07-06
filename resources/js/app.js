import "./bootstrap";
import "~resources/scss/app.scss";
import.meta.glob(["../img/**"]);
import * as bootstrap from "bootstrap";

const formSelects = document.querySelectorAll('.ms-form select');
// console.log(formSelects);

if(formSelects.length > 0) {
  formSelects.forEach((select) => {
    select.addEventListener('change', () => {
      // console.log('change');
      select.parentElement.submit();
    })
  })
}