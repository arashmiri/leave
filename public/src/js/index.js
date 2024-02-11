const fileInput = document.querySelector(".file-input"),
previewImg = document.querySelector(".preview-img img"),
chooseImgBtn = document.querySelector(".choose-img"),
changeName = document.querySelector(".change-name"),
nameInput = document.querySelector(".name-input"),
labelName = document.querySelector(".name-label"),
changeBadage = document.querySelector(".change-badage"),
badageInput = document.querySelector(".badage-input"),
labelBadage = document.querySelector(".badage-label"),
changePersonnelId = document.querySelector(".change-personnelId"),
personnelIdInput = document.querySelector(".personnelId-input"),
labelPersonnelId = document.querySelector(".personnelId-label"),
changeAddress = document.querySelector(".change-address"),
addressInput = document.querySelector(".address-input"),
labelAddress = document.querySelector(".address-label"),
saveImgBtn = document.querySelector(".save-img");

let brightness = "100", saturation = "100", inversion = "0", grayscale = "0";
let rotate = 0, flipHorizontal = 1, flipVertical = 1;

const loadImage = () => {
    let file = fileInput.files[0];
    if(!file) return;
    previewImg.src = URL.createObjectURL(file);
    previewImg.addEventListener("load", () => {
        resetFilterBtn.click();
        document.querySelector(".container").classList.remove("disable");
    });
}

const changeNameLabel = () => {
    labelName.classList.add("hidden");
    nameInput.classList.remove("hidden");
    changeName.classList.add("hidden");
}

const changeBadageLabel = () => {
    labelBadage.classList.add("hidden");
    badageInput.classList.remove("hidden");
    changeBadage.classList.add("hidden");
}

const changePersonnelIdLabel = () => {
    labelPersonnelId.classList.add("hidden");
    personnelIdInput.classList.remove("hidden");
    changePersonnelId.classList.add("hidden");
}

const changeAddressLabel = () => {
    labelAddress.classList.add("hidden");
    addressInput.classList.remove("hidden");
    changeAddress.classList.add("hidden");
}



// const saveImage = () => {
//     const canvas = document.createElement("canvas");
//     const ctx = canvas.getContext("2d");
//     canvas.width = previewImg.naturalWidth;
//     canvas.height = previewImg.naturalHeight;
    
//     ctx.filter = `brightness(${brightness}%) saturate(${saturation}%) invert(${inversion}%) grayscale(${grayscale}%)`;
//     ctx.translate(canvas.width / 2, canvas.height / 2);
//     if(rotate !== 0) {
//         ctx.rotate(rotate * Math.PI / 180);
//     }
//     ctx.scale(flipHorizontal, flipVertical);
//     ctx.drawImage(previewImg, -canvas.width / 2, -canvas.height / 2, canvas.width, canvas.height);
    
//     const link = document.createElement("a");
//     link.download = "image.jpg";
//     link.href = canvas.toDataURL();
//     link.click();
// }

// saveImgBtn.addEventListener("click", saveImage);
fileInput.addEventListener("change", loadImage);
chooseImgBtn.addEventListener("click", () => fileInput.click());
changeName.addEventListener("click", () => changeNameLabel());
changeBadage.addEventListener("click", () => changeBadageLabel());
changePersonnelId.addEventListener("click", () => changePersonnelIdLabel());
changeAddress.addEventListener("click", () => changeAddressLabel());
