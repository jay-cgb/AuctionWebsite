
function hideOrShowFields(){

    var categoryField = document.getElementById('category'); // storing the category form field so that its values can be accessed

    
    if(categoryField.value == ""){ // checking if no category is selected
        // set all the optional fields visibility to hidden
        const hideCollection = document.getElementsByClassName("field_visibility");
        for (let i = 0; i < hideCollection.length; i++) {
            hideCollection[i].style.display="none";
        }
    }



    if(categoryField.value == "1" || categoryField.value == "2"){

        // make sure that all the fields are set to hidden before displaying the neccessary ones
        const hideCollection = document.getElementsByClassName("field_visibility");
        for (let i = 0; i < hideCollection.length; i++) {
            hideCollection[i].style.display="none";
        }


        // loop through all the fields and their labels with the class names below and set their visibility to visible
        const collection1 = document.getElementsByClassName("medium");
        for (let i = 0; i < collection1.length; i++) {
            collection1[i].style.display="inline-block";
        }

        const collection2 = document.getElementsByClassName("is_framed");
        for (let i = 0; i < collection2.length; i++) {
            collection2[i].style.display="inline-block";
        }

        const collection3 = document.getElementsByClassName("dimension");
        for (let i = 0; i < collection3.length; i++) {
            collection3[i].style.display="inline-block";
        }
    }



    if(categoryField.value == "3"){
        // make sure that all the fields are set to hidden before displaying the neccessary ones
        const hideCollection = document.getElementsByClassName("field_visibility");
        for (let i = 0; i < hideCollection.length; i++) {
            hideCollection[i].style.display="none";
        }


        // loop through all the fields and their labels with the class names below and set their visibility to visible
        const collection1 = document.getElementsByClassName("image_type");
        for (let i = 0; i < collection1.length; i++) {
            collection1[i].style.display="inline-block";
        }

        const collection3 = document.getElementsByClassName("dimension");
        for (let i = 0; i < collection3.length; i++) {
            collection3[i].style.display="inline-block";
        }
    }



    if(categoryField.value == "4" || categoryField.value == "5"){
        // make sure that all the fields are set to hidden before displaying the neccessary ones
        const hideCollection = document.getElementsByClassName("field_visibility");
        for (let i = 0; i < hideCollection.length; i++) {
            hideCollection[i].style.display="none";
        }


        // loop through all the fields and their labels with the class names below and set their visibility to visible
        const collection1 = document.getElementsByClassName("material_used");
        for (let i = 0; i < collection1.length; i++) {
            collection1[i].style.display="inline-block";
        }

        const collection3 = document.getElementsByClassName("dimension");
        for (let i = 0; i < collection3.length; i++) {
            collection3[i].style.display="inline-block";
        }

        const collection2 = document.getElementsByClassName("weight");
        for (let i = 0; i < collection2.length; i++) {
            collection2[i].style.display="inline-block";
        }
   
    }
}