(function () {

    function gebId(element) {
        return document.getElementById(element); // פונ' שמחזירה את כל ההפנייה.
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

    // תקינות  סיסמא
    function checkPass(inputText) {
        var x = inputText.value;
        var regex = /^[0-9a-zA-Zא-ת]+$/;
        if (!x.match(regex)) {
            alert("אותיות וספרות בלבד");
            inputText.focus();
            return false;
        } else {
            return true
        }
    }

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

    //בדיקת הנתונים: האם הוקלדו אותן כתובות מייל וסיסמאות פעמיים
    //וכן בדיקה אם הנתונים מכילים תווים תקינים

    let form = gebId('formReg');
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        let takin = true;
        //בדיקת כתובות המייל
        let mail1 = gebId('mail1');
        let mail2 = gebId('mail2');

        if (mail1.value != mail2.value) {
            alert("כתובות המייל אינן זהות");
            mail1.focus();
            takin = false;
        }
        if (takin) {
            takin = ValidateEmail(mail1);
            if (takin) {
                //בדיקת הסיסמאות 
                let pass1 = gebId('password1');

                let pass2 = gebId('password2');
                if (pass1.value != pass2.value) {
                    alert(" הסיסמאות אינן זהות");
                    pass1.focus();
                    takin = false;
                }
                if (takin) {
                    takin = checkPass(pass1);
                    if (takin) {
                        //בדיקת שם פרטי ומשפחה 
                        let fname = gebId('fname');
                        if (fname.value) {
                            takin = checkText(fname);
                        }
                        if (takin) {
                            let lname = gebId('lname');
                            if (lname.value) {
                                takin = checkText(lname);
                            }
                            if (takin) {
                                let request = {
                                    url: "registerDB.php",
                                    method: "POST",
                                    data: {
                                        "mail": mail1.value,
                                        "pass": pass1.value,
                                        "fname": fname.value,
                                        "lname": lname.value
                                    },
                                    success: function (result) {
                                        if (result=="23000"){alert("אימייל כבר קיים במערכת")}
                                        else {
                                            alert("הרשמתך נקלטה במערכת, מוזמן לעבור למסך משחק");
                                            gebId('id').html = result;
                                            window.location.href='game.php';
                                        }
                                    },

                                };
                                $.ajax(request).catch((error) => {document.write(error)});
                                                               
                                return false;
                            }
                        }
                    }
                }
            }
        }
    })








})();