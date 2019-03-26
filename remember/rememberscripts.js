(function () {
    
    var pictures = ["birds", "birds", "sunset1", "sunset1", "sunset2", "sunset2", "rainbow", "rainbow", "vally", "vally", "tree1", "tree1", "flowers", "flowers"];

    var opens = [];
    var opensid = [];
    var finish = [];
    var mone = 0;

    function begin() {
        opens = [];
        opensid = [];
        finish = [];
        mone = 0;

        closePictures();
        shuffleArray(pictures);
    }

    begin();


    $('.cardi').on('click', function () {
        if (mone == 2) {
            alert("סגור קלפים פתוחים");
            return
        }
        
        var cardid = $(this).attr('id');
        
        if (jQuery.inArray(cardid, finish) != -1) {
            alert("הקלף כבר נבחר");
            return
        }
        

        if (jQuery.inArray(cardid, opensid) != -1) {
            alert("הקלף כבר נבחר");
            return
        }

        opens[mone] = pictures[cardid];
        opensid[mone] = cardid;

        mone++;

        this.src = "../pictures/" + pictures[cardid] + ".jpg";

        if (mone < 2) {
            return;
        }
        if (opens[0] == opens[1]) {
            setTimeout(function () {
                alert("יפה")
            }, 500);
            console.log(opensid);
            console.log(document.getElementById(opensid[0]).id);
            setTimeout(function () {
                document.getElementById(opensid[0]).src = "../pictures/empty.jpg";
                document.getElementById(opensid[1]).src = "../pictures/empty.jpg";
            }, 500)

            mone = 0;
            finish.push(opensid[0]);
            finish.push(opensid[1]);
            setTimeout(function () {
                if (finish.length == pictures.length) {
                    alert("כל הכבוד-הצלחת");
                }
            }, 900)

        }
    });

    function shuffleArray(array) {
        for (var i = array.length - 1; i > 0; i--) {
            var j = Math.floor(Math.random() * (i + 1));
            var temp = array[i];
            array[i] = array[j];
            array[j] = temp;
        }
    }

    function closePictures() {
        var all = document.querySelectorAll('img');
        all.forEach(function (img) {
            if (jQuery.inArray(img.id, finish) == -1) {
                img.src = "../pictures/reka.jpg"
            }
        });
        mone = 0;
    };

    $('#btn1').on('click', function () {
        begin();
    })

    $('#btn2').on('click', function () {
        closePictures();
    })

})();