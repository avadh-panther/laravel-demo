var tagArray = [];

var listCheckArr = [];

var myProductlistArr = [
    {
        product: "'Comfort' Fridge, 165cm (H) | K 3710",
        stat: "Active",
        inventory: "0 in Stock",
        type: "Fridge",
        vendor: "Lirbherr",
    },
    {
        product: "'Comfort' Fridge, 165cm (H) | K 3710",
        stat: "Active",
        inventory: "0 in Stock",
        type: "Fridge",
        vendor: "Lirbherr",
    },
    {
        product: "'Comfort' Fridge, 165cm (H) | K 3710",
        stat: "Draft",
        inventory: "0 in Stock",
        type: "Fridge",
        vendor: "Lirbherr",
    },
    {
        product: "'Comfort' Fridge, 165cm (H) | K 3710",
        stat: "Draft",
        inventory: "0 in Stock",
        type: "Fridge",
        vendor: "Lirbherr",
    },
    {
        product: "'Comfort' Fridge, 165cm (H) | K 3710",
        stat: "Draft",
        inventory: "0 in Stock",
        type: "Fridge",
        vendor: "Lirbherr",
    },
    {
        product: "'Comfort' Fridge, 165cm (H) | K 3710",
        stat: "Active",
        inventory: "0 in Stock",
        type: "Fridge",
        vendor: "Lirbherr",
    },
    {
        product: "'Comfort' Fridge, 165cm (H) | K 3710",
        stat: "Active",
        inventory: "0 in Stock",
        type: "Fridge",
        vendor: "Lirbherr",
    },
    {
        product: "'Comfort' Fridge, 165cm (H) | K 3710",
        stat: "Active",
        inventory: "0 in Stock",
        type: "Fridge",
        vendor: "Lirbherr",
    },
    {
        product: "'Comfort' Fridge, 165cm (H) | K 3710",
        stat: "Draft",
        inventory: "0 in Stock",
        type: "Fridge",
        vendor: "Lirbherr",
    },
    {
        product: "'Comfort' Fridge, 165cm (H) | K 3710",
        stat: "Draft",
        inventory: "0 in Stock",
        type: "Fridge",
        vendor: "Lirbherr",
    },
    {
        product: "'Comfort' Fridge, 165cm (H) | K 3710",
        stat: "Active",
        inventory: "0 in Stock",
        type: "Fridge",
        vendor: "Lirbherr",
    },
    {
        product: "'Comfort' Fridge, 165cm (H) | K 3710",
        stat: "Active",
        inventory: "0 in Stock",
        type: "Fridge",
        vendor: "Lirbherr",
    },
    {
        product: "'Comfort' Fridge, 165cm (H) | K 3710",
        stat: "Active",
        inventory: "0 in Stock",
        type: "Fridge",
        vendor: "Lirbherr",
    },
];

var current_page = 1;
var records_per_page = 4;

// =================================================_Form_Module_========================================================

var formModule = {
    //--------------------------------------------------Sale Channel-------------------------------------------------------
    schedule: function () {
        let store = document.getElementById("store");
        let sch = document.getElementById("schedule");

        if (store.checked == true) {
            sch.style.display = "block";
        } else {
            sch.style.display = "none";
        }
    },

    sale_chanel: function () {
        let check = document.getElementsByClassName("messageCheck");
        let selector2 = document.getElementById("selector");
        let arr = [];

        for (let x = 0; x < check.length; x++) {
            if (check[x].checked == true) {
                arr.push(true);
            } else {
                arr.pop();
            }

            if (arr.length < check.length) {
                selector2.innerHTML = "Select all";
            } else {
                selector2.innerHTML = "Deselect all";
            }
        }
        formModule.schedule();
    },

    check_box: function () {
        let check = document.getElementsByClassName("messageCheck");

        for (let x = 0; x < check.length; x++) {
            check[x].addEventListener("click", formModule.sale_chanel);
        }
    },

    selector: function () {
        let check = document.getElementsByClassName("messageCheck");
        let selector1 = document.getElementById("selector");

        if (selector1) {
            selector1.addEventListener("click", function () {
                for (let x = 0; x < check.length; x++) {
                    if (selector1.innerHTML == "Select all") {
                        check[x].checked = true;
                    } else {
                        check[x].checked = false;
                    }
                }
                formModule.sale_chanel();
                formModule.schedule();
            });
        }
    },

    //----------------------------------------------------Pricing---------------------------------------------------------

    calculation: function () {
        let cost = document.getElementById("cost");
        let price = document.getElementById("price");
        let margin = document.getElementById("margin");
        let profit = document.getElementById("profit");

        if (price.value == "" || price.value == null) {
            margin.innerHTML = "-";
            profit.innerHTML = "-";
        } else {
            margin.innerHTML = `Rs. ${price.value - cost.value}`;
            profit.innerHTML =
                (100 * (price.value - cost.value)) / price.value + "%";
        }
    },

    price: function () {
        let price = document.getElementById("price");

        if (price) {
            price.addEventListener("keyup", formModule.calculation);
        }
    },

    cost: function () {
        let cost = document.getElementById("cost");
        if (cost) {
            cost.addEventListener("keyup", formModule.calculation);
        }
    },

    //------------------------------------------------------Tags-----------------------------------------------------------

    drop_down: function () {
        let dropdown = document.getElementById("dropdown");

        if (dropdown) {
            dropdown.addEventListener("mouseleave", function () {
                dropdown.style.display = "none";
            });
        }
    },

    tag: function () {
        let dropdown = document.getElementById("dropdown");
        let input = document.getElementById("tag-input");

        if (input) {
            input.addEventListener("click", function () {
                dropdown.style.display = "block";
            });
        }

        if (dropdown) {
            dropdown.addEventListener("focus", function () {
                dropdown.style.display = "block";
            });
        }
    },

    organisation: function () {
        let form4 = document.getElementById("form4");

        if (form4) {
            form4.addEventListener("click", function () {
                formModule.deleteTag();
            });
        }
    },

    displayTag: function () {
        let display = document.getElementById("display-tag");
        let str = "";
        for (let i = 0; i < tagArray.length; i++) {
            str += `<span class="tag_val"> ${tagArray[i]} &nbsp<span data-span_value="${tagArray[i]}" class="delete"> <i class="fas fa-times"></i> </span></span>`;
        }

        display.innerHTML = str;
    },

    deleteTag: function () {
        let val = document.getElementsByClassName("delete");

        if (val) {
            for (let j = 0; j < val.length; j++) {
                val[j].addEventListener("click", function () {
                    let btn_val = val[j].dataset.span_value;
                    let checkbox_value =
                        document.getElementsByClassName("drop-check");
                    let indValue = tagArray.indexOf(btn_val);

                    for (let i = 0; i < checkbox_value.length; i++) {
                        if (checkbox_value[i].value == btn_val) {
                            checkbox_value[i].checked = false;
                        }
                    }

                    if (indValue > -1) {
                        tagArray.splice(indValue, 1);
                    }

                    formModule.displayTag();
                });
            }
        }
    },

    add_checkbox: function () {
        let newVal = document.getElementById("new").innerText;
        let dropdown = document.getElementById("dropdown");
        let elemP = document.createElement("P");
        let elemInput = document.createElement("INPUT");

        elemInput.setAttribute("type", "checkbox");
        elemInput.setAttribute("value", newVal);
        elemInput.setAttribute("class", "drop-check");
        elemInput.setAttribute("name", "tags[]");
        elemInput.checked = true;

        let txt = document.createTextNode(newVal);
        elemP.appendChild(elemInput);
        elemP.appendChild(txt);
        dropdown.appendChild(elemP);
        tagArray.push(newVal);

        formModule.displayTag();
    },

    add_checkVal: function () {
        add_button = document.getElementById("add-btn");

        if (add_button) {
            add_button.addEventListener("click", function () {
                formModule.add_checkbox();
                // formModule.checked_tags();
            });
        }
    },

    search_tag: function () {
        let inputText = document.getElementById("tag-input");

        if (inputText) {
            inputText.addEventListener("keyup", function (event) {
                let input_val = inputText.value.toUpperCase();
                let dropdown = document.getElementById("dropdown");
                let label = dropdown.getElementsByTagName("p");
                let add_btn = document.getElementById("add-btn");
                let add_btn_add = document.getElementById("new");

                if (input_val == "" || input_val == null) {
                    add_btn.style.display = "none";
                } else {
                    add_btn.style.display = "block";
                    add_btn_add.innerHTML = inputText.value;
                }

                if (event.keyCode == 13) {
                    formModule.add_checkbox();
                    formModule.checked_tags();
                }

                for (let i = 0; i < label.length; i++) {
                    let box = label[i].getElementsByClassName("drop-check")[0];
                    let txtValue = box.value.toUpperCase();
                    if (txtValue.indexOf(input_val) > -1) {
                        label[i].style.display = "";
                    } else {
                        if (input_val == "" || input_val == null) {
                            label[i].style.display = "";
                        } else {
                            label[i].style.display = "none";
                        }
                    }
                }
            });
        }
    },

    checked_tags: function () {
        let checkBox = document.getElementsByClassName("drop-check");

        for (let i = 0; i < checkBox.length; i++) {
            checkBox[i].addEventListener("click", function () {
                if (checkBox[i].checked == true) {
                    tagArray.push(checkBox[i].value);
                } else {
                    let indVal = tagArray.indexOf(checkBox[i].value);
                    if (indVal > -1) {
                        tagArray.splice(indVal, 1);
                    }
                }
                formModule.displayTag();
            });
        }
    },

    //----------------------------------------------------Vendor-----------------------------------------------------------

    vendor_dropdown: function () {
        let dropdown1 = document.getElementsByClassName("dropdown1")[0];
        let input_vendor = document.getElementsByClassName("input-vendor")[0];

        if (input_vendor) {
            input_vendor.addEventListener("click", function () {
                dropdown1.style.display = "block";
            });
        }

        if (dropdown1) {
            dropdown1.addEventListener("click", function () {
                dropdown1.style.display = "block";
            });
        }
    },

    vendor_drop_blur: function () {
        let dropdown1 = document.getElementsByClassName("dropdown1")[0];

        if (dropdown1) {
            dropdown1.addEventListener("mouseleave", function () {
                dropdown1.style.display = "none";
            });
        }
    },

    add_elem: function () {
        let newVal = document.getElementById("newDrop").innerText;
        let container = document.getElementsByClassName("dropdown1")[0];
        let elemP = document.createElement("P");
        let txt = document.createTextNode(newVal);

        elemP.setAttribute("class", "vendor_list");
        container.appendChild(elemP);
        elemP.appendChild(txt);
    },

    add_elemFun: function () {
        let addDrop = document.getElementById("addDrop");

        if (addDrop) {
            addDrop.addEventListener("click", formModule.add_elem);
        }
    },

    search_drop: function () {
        let inputText = document.getElementsByClassName("input-vendor")[0];

        if (inputText) {
            inputText.addEventListener("keyup", function (event) {
                let input_val = inputText.value.toUpperCase();
                let dropdown = document.getElementsByClassName("dropdown1")[0];
                let label = dropdown.getElementsByTagName("p");

                if (event.keyCode == 13) {
                    formModule.add_elem();
                    document.getElementsByClassName(
                        "dropdown1"
                    )[0].style.display = "none";
                }

                for (let i = 0; i < label.length; i++) {
                    let txtValue = label[i].innerText.toUpperCase();
                    let add_btn = document.getElementById("addDrop");
                    let add_btn_add = document.getElementById("newDrop");

                    if (input_val == "" || input_val == null) {
                        add_btn.style.display = "none";
                    } else {
                        add_btn.style.display = "block";
                        add_btn_add.innerHTML = inputText.value;
                    }

                    if (txtValue.indexOf(input_val) > -1) {
                        label[i].style.display = "";
                    } else {
                        if (input_val == "" || input_val == null) {
                            label[i].style.display = "revert";
                        } else {
                            label[i].style.display = "none";
                        }
                    }
                }
            });
        }
    },

    getVal: function () {
        let selected = document.getElementsByClassName("vendor_list");

        for (let j = 0; j < selected.length; j++) {
            selected[j].addEventListener("click", function () {
                document.getElementsByClassName("input-vendor")[0].value =
                    selected[j].innerText;
            });
        }
    },
};

// =================================================_Product_Module_====================================================

var productModule = {
    //----------------------------------------------------active_nav-------------------------------------------------------

    navList: function () {
        let input = document.getElementsByClassName("product_tabs");

        if (input) {
            for (let i = 0; i < input.length; i++) {
                input[i].addEventListener("click", function () {
                    let value = input[i].innerText.toUpperCase();
                    let table = document.getElementById("table-body");
                    let btn_prev = document.getElementById("prev");
                    let btn_next = document.getElementById("nxt");
                    table.innerHTML = "";

                    if (value == "ALL") {
                        btn_prev.style.display = "unset";
                        btn_next.style.display = "unset";
                    } else {
                        btn_prev.style.display = "none";
                        btn_next.style.display = "none";
                    }

                    //       for (let i = 0; i < myProductlistArr.length; i++) {
                    //           if (myProductlistArr[i].stat.toUpperCase() == value) {
                    //               table.innerHTML += `<tr>
                    // <td> <input type="checkbox" class="table-check"> </td>
                    // <td>${myProductlistArr[i].product}</td>
                    // <td class="getVal">${myProductlistArr[i].stat}</td>
                    // <td> ${myProductlistArr[i].inventory} </td>
                    // <td> ${myProductlistArr[i].type} </td>
                    // <td> ${myProductlistArr[i].vendor} </td>
                    // </tr>
                    // `;
                    //           }
                    //       }

                    //       if (value == "ALL") {
                    //           productModule.changePage(1);
                    //       }

                    //       localStorage.setItem(
                    //           "productlist_tab",
                    //           input[i].dataset.tabs
                    //       );
                    //       listCheckArr.splice(0, listCheckArr.length);
                    //       productModule.numberOfSelection();
                    //       productModule.forNext_Previous();
                    productModule.checkProductList();
                });
            }
        }
    },

    //--------------------------------------------------Check_Productlist--------------------------------------------------

    checkAllFun: function (value) {
        let table_check = document.getElementsByClassName("table-check");
        let btnGrp = document.getElementsByClassName("level2")[0];
        let thead = document.getElementById("thead");

        listCheckArr.splice(0, listCheckArr.length);

        for (let i = 0; i < table_check.length; i++) {
            if (value.checked == true) {
                table_check[i].checked = true;
                listCheckArr.push(true);
            } else {
                table_check[i].checked = false;
                listCheckArr.splice(0, listCheckArr.length);
                document.getElementById("thCheck").checked = false;
            }
        }

        if (listCheckArr.length == 0) {
            btnGrp.style.display = "none";
            thead.style.display = "revert";
        }

        productModule.numberOfSelection();
    },

    checkAll: function () {
        let mainCheck = document.getElementById("mainCheck");

        if (mainCheck) {
            mainCheck.addEventListener("click", function () {
                productModule.checkAllFun(mainCheck);
            });
        }
    },

    checkProductList: function () {
        let checkbox = document.getElementsByClassName("table-check");

        if (checkbox) {
            for (let i = 0; i < checkbox.length; i++) {
                checkbox[i].addEventListener("click", function () {
                    let btnGrp = document.getElementsByClassName("level2")[0];
                    let thead = document.getElementById("thead");
                    let mainCheck = document.getElementById("mainCheck");

                    if (checkbox[i].checked == true) {
                        listCheckArr.push(true);
                    } else {
                        listCheckArr.pop();
                        document.getElementById("thCheck").checked = false;
                    }

                    if (listCheckArr.length > 0) {
                        btnGrp.style.display = "unset";
                        thead.style.display = "none";

                        productModule.numberOfSelection();
                    } else {
                        btnGrp.style.display = "none";
                        thead.style.display = "revert";
                    }

                    if (listCheckArr.length == checkbox.length) {
                        mainCheck.checked = true;
                    } else {
                        mainCheck.checked = false;
                    }
                });
            }
        }
    },

    headCheck: function () {
        let thCheck = document.getElementById("thCheck");

        if (thCheck) {
            thCheck.addEventListener("click", function () {
                document.getElementsByClassName("level2")[0].style.display =
                    "unset";
                document.getElementById("thead").style.display = "none";
                document.getElementById("mainCheck").checked = true;

                productModule.numberOfSelection();
                productModule.checkAllFun(thCheck);
            });
        }
    },

    forNext_Previous: function () {
        document.getElementById("thCheck").checked = false;
        document.getElementById("mainCheck").checked = false;
        document.getElementsByClassName("level2")[0].style.display = "none";
        document.getElementById("thead").style.display = "revert";
    },

    numberOfSelection: function () {
        document.getElementById("selectedNum").innerHTML = listCheckArr.length;
    },

    //-------------------------------------------------- Activation ------------------------------------------------------

    activarion_tabs: function () {
        localStorage.setItem("current_page", "");
        let product_tabs = jQuery(".product_tabs");

        product_tabs.on("click", function () {
            product_tabs.removeClass("underline");
            jQuery(this).addClass("underline");
        });

        let localItem = localStorage.getItem("productlist_tab");
        let el = jQuery("[data-tabs='" + localItem + "']");

        el.addClass("underline");

        for (let i = 0; i < product_tabs.length; i++) {
            if (product_tabs[i].dataset.tabs == localItem) {
                let value = product_tabs[i].innerText.toUpperCase();
                let table = document.getElementById("table-body");
                let btn_prev = document.getElementById("prev");
                let btn_next = document.getElementById("nxt");
                table.innerHTML = "";

                if (value == "ALL") {
                    btn_prev.style.display = "unset";
                    btn_next.style.display = "unset";
                } else {
                    btn_prev.style.display = "none";
                    btn_next.style.display = "none";
                }

                for (let i = 0; i < myProductlistArr.length; i++) {
                    if (myProductlistArr[i].stat.toUpperCase() == value) {
                        table.innerHTML += `<tr>
                                <td> <input type="checkbox" class="table-check"> </td>
                                <td>${myProductlistArr[i].product}</td>
                                <td class="getVal">${myProductlistArr[i].stat}</td>
                                <td> ${myProductlistArr[i].inventory} </td>
                                <td> ${myProductlistArr[i].type} </td>
                                <td> ${myProductlistArr[i].vendor} </td>
                                </tr>
                                `;
                    }
                }

                if (value == "ALL") {
                    productModule.changePage(1);
                }

                listCheckArr.splice(0, listCheckArr.length);
                productModule.forNext_Previous();
            }
        }
    },

    welcome: function () {
        let side_opt = document.getElementsByClassName("side_opt");

        for (let i = 0; i < side_opt.length; i++) {
            if (i === 2) {
                continue;
            } else {
                if (side_opt[i]) {
                    side_opt[i].addEventListener("click", function () {
                        jQuery("#screen").load("common.html");
                    });
                }
            }
        }
    },
};

// =================================================_Index_Module_======================================================

var indexModule = {
    display_list: function () {
        let subMenu = document.getElementById("sub-menu");
        let product_button = document.querySelector('[data-nav="products"]');

        if (product_button) {
            product_button.addEventListener("click", function () {
                if (subMenu.style.display == "block") {
                    subMenu.style.display = "block";
                } else {
                    subMenu.style.display = "block";
                    let localItem = localStorage.getItem("current_page");
                    if (localItem !== "add_edit_form")
                        jQuery("#product").trigger("click");
                }
            });
        }
    },

    setting_position: function () {
        let setting_div = document.getElementsByClassName("side-bar")[0];

        if (setting_div) {
            setting_div.addEventListener("scroll", function () {
                let setting = document.getElementById("setting");
                setting.style.position = "unset";
                setting.style.marginTop = "30px";
            });
        }
    },

    //-------------------------------------------------- Activation ------------------------------------------------------

    activation_side_menu: function () {
        let side_opt = jQuery(".side_opt");

        side_opt.on("click", function (event) {
            side_opt.removeClass("bg-green");
            jQuery(this).addClass("bg-green");
            localStorage.setItem("navClick", jQuery(this).data("nav"));
        });

        let localItem = localStorage.getItem("navClick");
        let el = jQuery("[data-nav='" + localItem + "']");
        el.addClass("bg-green");

        if (localItem === "products") {
            el.trigger("click");
        } else {
            el.trigger("click");
        }
    },

    activation_sub_menu: function () {
        let localItem = localStorage.getItem("subClick");
        let elem = jQuery("[data-subNav='" + localItem + "']");
        let sub_option = jQuery(".sub_option");

        elem.addClass("bg-blue");

        if (localItem === "allproduct") {
            elem.trigger("click");
        }

        sub_option.on("click", function () {
            sub_option.removeClass("bg-blue");
            jQuery(this).addClass("bg-blue");
            localStorage.setItem("subClick", jQuery(this).attr("data-subNav"));
        });
    },
};

jQuery(document).ready(function () {
    formModule.check_box();
    formModule.selector();
    formModule.price();
    formModule.cost();
    formModule.drop_down();
    formModule.tag();
    formModule.search_tag();
    formModule.add_checkVal();
    formModule.checked_tags();
    formModule.organisation();
    formModule.vendor_dropdown();
    formModule.vendor_drop_blur();
    formModule.search_drop();
    formModule.getVal();
    formModule.add_elemFun();

    productModule.navList();
    productModule.checkAll();
    productModule.checkProductList();
    productModule.headCheck();

    indexModule.display_list();
    indexModule.setting_position();
    indexModule.activation_side_menu();
    indexModule.activation_sub_menu();
});
