

$(document).ready(function () {
    /*SEGUNDO VÍDEO SEGÚN EL BOTÓN QUE ESCOJAS*/

    // Storing the video element through its id
    var v = document.getElementById("Vid");


    // Hiding the scroller while video is playing
    v.onplaying = function () {
        document.body.style.overflow = 'hidden';
    };

    // Executes only when the video ends
    v.onended = function () {

        // Enabling the scroller
        document.body.style.overflow = '';

        // Scrolling to the next element by
        // linking to its Id
        document.getElementById("botones").scrollIntoView();
    };


});



/*BOTONES*/






/*BOTÓN 1*/

$(document).ready(function () {
    $('#btn-1').on({
        'click': function () {
            $('#Vid2').attr('src', 'https://videos.idearium.es/1-paz_espiritual_2.mp4');
        }


    });




    $witdh = $(document).width();
    console.log($witdh);
    if ($witdh > '700') {
        //   $('#exampleModal').modal('toggle');
        //  alert('gire el dispositivo');
    }
});







/*BOTÓN 2*/

$(document).ready(function () {
    $('#btn-2').on({
        'click': function () {
            $('#Vid2').attr('src', 'https://videos.idearium.es/2-paz_en_el_mundo_2.mp4');
        }


    });




    $witdh = $(document).width();
    console.log($witdh);
    if ($witdh > '700') {
        //   $('#exampleModal').modal('toggle');
        //  alert('gire el dispositivo');
    }
});





/*BOTÓN 3*/

$(document).ready(function () {
    $('#btn-3').on({
        'click': function () {
            $('#Vid2').attr('src', 'https://videos.idearium.es/3-paz_de_relax_1.mp4');
        }


    });




    $witdh = $(document).width();
    console.log($witdh);
    if ($witdh > '700') {
        //   $('#exampleModal').modal('toggle');
        //  alert('gire el dispositivo');
    }
});





/*BOTÓN 4*/

$(document).ready(function () {
    $('#btn-4').on({
        'click': function () {
            $('#Vid2').attr('src', 'https://videos.idearium.es/4-la_paz_2.mp4');
        }


    });




    $witdh = $(document).width();
    console.log($witdh);
    if ($witdh > '700') {
        //   $('#exampleModal').modal('toggle');
        //  alert('gire el dispositivo');
    }
});




/*BOTÓN 5*/

$(document).ready(function () {
    $('#btn-5').on({
        'click': function () {
            $('#Vid2').attr('src', 'https://videos.idearium.es/5-mari_paz.mp4');
        }


    });




    $witdh = $(document).width();
    console.log($witdh);
    if ($witdh > '700') {
        //   $('#exampleModal').modal('toggle');
        //  alert('gire el dispositivo');
    }
});




/*???? */

function myFunction() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}





