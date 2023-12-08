// document.querySelectorAll('.dropdown-toggle').forEach(item => {
//     item.addEventListener('click', event => {

//       if(event.target.classList.contains('dropdown-toggle') ){
//         event.target.classList.toggle('toggle-change');
//       }
//       else if(event.target.parentElement.classList.contains('dropdown-toggle')){
//         event.target.parentElement.classList.toggle('toggle-change');
//       }
//     })
//   });
const addLangkahBtn = document.querySelector(".add-langkah");
const addBahanBtn = document.querySelector(".add-bahan");
const inputBahan = document.querySelector(".input-bahan");
const inputLangkah = document.querySelector(".input-langkah");

function removeInput(){
  this.parentElement.remove();
}

function addInputBahan(){
  const bahan = document.createElement("input");
  bahan.className = "form-control mt-3";
  bahan.type="text";
  bahan.placeholder = "Bahan";

  const icon = document.createElement("i");
  icon.className = "fa-solid fa-bars pe-2";

  const btn=document.createElement("a");
  btn.className = "delete";
  btn.innerHTML = "&times";

  btn.addEventListener("click",removeInput)

  const flex = document.createElement("div");
  flex.className = "d-flex align-items-center";

  inputBahan.appendChild(flex);
  flex.appendChild(icon);
  flex.appendChild(bahan);

}


function addInputlangkah(){
  const langkah = document.createElement("input");
  langkah.className = "form-control mt-3";
  langkah.type="text";
  langkah.placeholder = "Langkah - langkah";

  const icon = document.createElement("i");
  icon.className = "fa-solid fa-bars pe-2";

  const btn=document.createElement("a");
  btn.className = "delete";
  btn.innerHTML = "&times";

  btn.addEventListener("click",removeInput)

  const flex = document.createElement("div");
  flex.className = "d-flex align-items-center";

  inputLangkah.appendChild(flex);
  flex.appendChild(icon);
  flex.appendChild(langkah);

}

addBahanBtn.addEventListener("click", addInputBahan);

addLangkahBtn.addEventListener("click", addInputlangkah);
