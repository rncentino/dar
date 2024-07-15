const data = {
  allen: [""],
  biri: [""],
  bobon: [""],
  capul: [""],
  catarman: [""],
  catubig: [""],
  gamay: [""],
  laoang: [""],
  lapinig: [""],
  lasnavas: [""],
  lavezares: [""],
  lopedevega: [""],
  mapanas: [""],
  mondragon: [""],
  palapag: [""],
  pambuhan: [""],
  rosario: [""],
  sanantonio: [""],
  sanisidro: [""],
  sanjose: [""],
  sanroque: [""],
  sanvicente: [""],
  silvinolobos: [""],
  victoria: [""],
};

const firstSelect = document.getElementById("firstSelect");
const secondSelect = document.getElementById("secondSelect");

firstSelect.addEventListener("change", function () {
  const selectedOption = this.value;
  const options = data[selectedOption];

  // Clear previous options
  secondSelect.innerHTML =
    '<option value="" selected disabled>Choose an option</option>';

  // Enable second select input
  secondSelect.disabled = false;

  // Populate second select input with new options
  options.forEach((option) => {
    const newOption = document.createElement("option");
    newOption.value = option;
    newOption.textContent = option;
    secondSelect.appendChild(newOption);
  });
});
