(function () {

    function gebId(element) {
        return document.getElementById(element); // פונ' שמחזירה את כל ההפנייה.
    }

//עדכון פרטים אישיים של משתמש בבסיס הנתונים
    $('#btn4').on('click', function () { 
        userUpdateDetailsDb();
    })

//בדיקת תקינות מייל
function ValidateEmail(inputText) {
    //var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var mailformat = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if (inputText.value.match(mailformat)) {
        inputText.focus();
        return true;
    } else {
        alert("אימייל לא תקין");
        inputText.focus();
        return false;
    }
}
// תקינות שם משתמש
function checkText(text) {
    var x = text.value;
    var regex = /^[a-zA-Zא-ת]+$/;
    if (!x.match(regex)) {
        alert("אותיות בלבד");
        text.focus();
        return false;
    } else {
        return true
    }
}
    function userUpdateDetailsDb(){
        let first_name = (gebId("inputFN"));
        let last_name = (gebId("inputLN"));
        let email = (gebId("inputEmail"));
        let id = (gebId("inputId"));


//בדיקת שם פרטי ומשפחה 
    let takin = checkText(first_name);
    if (takin) {
        takin = checkText(last_name);
        if (takin) {
            takin = ValidateEmail(email);  //בדיקת כתובות המייל
            if (takin) {
        
                let request = {
                    url: "updateDetailsDB.php",
                    method: "POST",
                    data: {
                        "id": id.value,
                        "first_name": first_name.value,
                        "last_name": last_name.value,
                        "email": email.value
                    },
                    success: function (result) {
                        alert("הפרטים עודכנו");
                        setTimeout(function () {
                            location.reload();
                        },500);
                    }   
                }
                $.ajax(request).catch((error) => {
                    document.write(error)
                });        
            }
        }
    }
}


})();