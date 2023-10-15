window.focus();
window.print();
window.onafterprint = window.close;   

const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
  window.print();
});
