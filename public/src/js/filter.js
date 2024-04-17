groupFilter = document.querySelector(".group-filter"),
openDropdown = document.querySelector(".open-dropdown"),
selectAll = document.querySelector(".select-all");
deSelectAll = document.querySelector(".deselect-all");


const filterDropDown = () => {
    if (groupFilter.classList.contains('hidden')) {
        groupFilter.classList.remove("hidden");
        groupFilter.classList.add("flex");
    } else {
        groupFilter.classList.remove("flex");
        groupFilter.classList.add("hidden");
    }
}

const selects = () => {
    var ele = document.getElementsByName("user")
    for (var i = 0; i < ele.length; i++) {
        if (ele[i].type == 'checkbox') {
            ele[i].checked = true;
            deSelectAll.classList.remove("hidden");
            deSelectAll.classList.add("flex");
        }
    }
}

const deSelect = () => {
    var ele = document.getElementsByName("user")
    for (var i = 0; i < ele.length; i++) {
        if (ele[i].type == 'checkbox') {
            ele[i].checked = false;
        }
    }
}

openDropdown.addEventListener("click", () => filterDropDown());
selectAll.addEventListener("click", () => selects());
deSelectAll.addEventListener("click", () => deSelect());
