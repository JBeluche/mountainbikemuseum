<script>


window.addEventListener('resize', resize);
window.onload = resize;

function resize(){ 
    //Get the element
    var content = document.getElementById("main_textfield");;

    //Get the height of content
    var contentHeight = content.clientHeight;


    //Add small image 1
    if(contentHeight > 500){
        var image2 = document.getElementById('background-image-1');

        image2.style.height = '500px';
        image2.style.display = "block"; 
        document.getElementById("retrobar-1").style.display = "block"; 
    }
    else if(contentHeight < 500){
    document.getElementById("background-image-1").style.display = "none"; 
    document.getElementById("retrobar-1").style.display = "none"; 
    }

    //Break small image 1
    if(contentHeight > 1000){
        var image2 = document.getElementById('background-image-1');
        image2.style.height = '1000px';
    }


    //Add small image 2
    if(contentHeight > 1500){
        var image2 = document.getElementById('background-image-2');

        image2.style.height = '500px';
        image2.style.display = "block"; 
        document.getElementById("retrobar-2").style.display = "block"; 
    }
    else if(contentHeight < 1500){
    document.getElementById("background-image-2").style.display = "none"; 
    document.getElementById("retrobar-2").style.display = "none"; 
    }

    //Break small image 2
    if(contentHeight > 2000){
        var image2 = document.getElementById('background-image-2');
        image2.style.height = '1000px';
    }
    
    //Add small image 3
    if(contentHeight > 2500){
        var image2 = document.getElementById('background-image-3');

        image2.style.height = '500px';
        image2.style.display = "block"; 
        document.getElementById("retrobar-3").style.display = "block"; 
    }
    else if(contentHeight < 2500){
        document.getElementById("background-image-3").style.display = "none"; 
        document.getElementById("retrobar-3").style.display = "none"; 
    }

    //Break small image 3
    if(contentHeight > 3000){
        var image2 = document.getElementById('background-image-3');
        image2.style.height = '1000px';
    }

    //Add small image 4
    if(contentHeight > 3500){
        var image2 = document.getElementById('background-image-4');

        image2.style.height = '500px';
        image2.style.display = "block"; 
        document.getElementById("retrobar-4").style.display = "block"; 
    }
    else if(contentHeight < 3500){
        document.getElementById("background-image-4").style.display = "none"; 
        document.getElementById("retrobar-4").style.display = "none"; 
    }

    //Break small image 4
    if(contentHeight > 4000){
        var image2 = document.getElementById('background-image-4');
        image2.style.height = '1000px';
    }


}


</script>