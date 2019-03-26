(function () {

    function gebId(element) {
        return document.getElementById(element); // פונ' שמחזירה את כל ההפנייה.
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


    //בדיקת הנתונים: האם הוקלדו כתובת מייל וסיסמא מתאימות וקיימות
    //וכן בדיקה אם הנתונים מכילים תווים תקינים
    let form = gebId('formSignin');
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        let takin = true;
        //בדיקת כתובות המייל
        let mail1 = gebId('email');
        takin = ValidateEmail(mail1);
        if (takin) {
            //בדיקת הסיסמא 
            let pass1 = gebId('password1');
            if (!pass1.value) {
                takin = false;
                alert("נא להזין סיסמה")
                pass1.focus();
            }

            if (takin) {
                takin = checkPass(pass1);
                if (takin) {
                    let remember1 = gebId('remember');
                    let request = {
                        url: "signinDB.php",
                        method: "POST",
                        data: {
                            "mail": mail1.value,
                            "pass": pass1.value,
                            "remember": remember1.value
                        },
                        success: function (result) {                        
                            if (result == "5") //משתמש תקין: קיים במאגר וסיסמה נכונה
                            {
                                window.location.href = 'game.php';
                            } else {
                                window.location.href = 'signin.php';
                            }; //משתמש או סיסמה לא נכונים

                        },
                        fail: function (xhr, textStatus, errorThrown) {
                            alert('request failed');
                            alert(xhr);
                            alert(textStatus);
                            alert(errorThrown);
                        },
                    };

                    $.ajax(request).catch((error) => {
                        document.write(error)
                    });

                    return false;
                }

            }

        }

    })

})();