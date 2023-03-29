function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function (e) {
        var a,
            b,
            i,
            val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) {
            return false;
        }
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (
                arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()
            ) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML =
                    "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function (e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function (e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) {
            //up
            /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
            }
        }
    });
    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = x.length - 1;
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
}

/*An array containing all the country names in the world:*/
const banks = [
    "Advans La Fayette Microfinance Bank",
    "Accion Microfinance Bank",
    "Access Bank Plc",
    "Citibank Nigeria",
    "Coronation Merchant Bank",
    "Covenant Microfinance Bank Ltd",
    "Ecobank Nigeria Plc",
    "Empire Trust Microfinance Bank",
    "FBNQuest Merchant Bank",
    "Fidelity Bank Plc",
    "Fina Trust Microfinance Bank",
    "Finca Microfinance Bank Limited",
    "First Bank of Nigeria",
    "First City Monument Bank",
    "FSDH Merchant Bank",
    "Globus Bank",
    "Guaranty Trust Bank Plc",
    "Heritage Banking Company ",
    "Infinity Microfinance Bank",
    "Jaiz Bank Plc",
    "Kuda Bank",
    "Keystone Bank",
    "Lotus Bank",
    "Mutual Trust Microfinance Bank",
    "Mint Finex MFB",
    "Mkobo MFB",
    "Moniepoint Microfinance Bank",
    "Nova Merchant Bank",
    "Opay Paycom",
    "Peace Microfinance Bank",
    "Palmpay",
    "Parallex Bank Limited",
    "PremiumTrust Bank Limited",
    "Pearl Microfinance Bank Limited",
    "Polaris Bank",
    "Providus Bank",
    "Rephidim Microfinance Bank",
    "Rand Merchant Bank",
    "Rubies Bank",
    "Stanbic IBTC Bank Plc",
    "Sparkle Bank",
    "Standard Chartered",
    "Sterling Bank Plc",
    "Shepherd Trust Microfinance Bank",
    "SunTrust Bank Nigeria ",
    "TAJBank",
    "Titan Trust Bank",
    "Union Bank of Nigeria Plc",
    "United Bank for Africa Plc",
    "Unity Bank Plc",
    "VFD Microfinance Bank",
    "Wema Bank Plc",
    "Zenith Bank Plc",
];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), banks);
