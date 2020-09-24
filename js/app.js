
let rightButton = document.getElementById('rightButton');
let leftButton = document.getElementById('leftButton');


let unselectedItems = document.getElementsByName('unselectedItems');
let unselectedItemsChecked = false;
for ( let i = 0; i < unselectedItems.length; i++) {
    if(unselectedItems[i].checked) {
        unselectedItemsChecked = true;
        break;
    }
}
if(!unselectedItemsChecked){
    rightButton.disabled = true;
}
else{
    rightButton.disabled = false;
}




let selectedItems = document.getElementsByName('selectedItems');
let selectedItemsChecked = false;
for ( let i = 0; i < selectedItems.length; i++) {
    if(selectedItems[i].checked) {
        selectedItemsChecked = true;
        break;
    }
}
if(!unselectedItemsChecked){
    leftButton.disabled = true;
}
else{
    leftButton.disabled = false;
}




function leftRadioClicked(){
    rightButton.disabled = false;
}

function rightRadioClicked(){
    leftButton.disabled = false;
}



function addItem(){
    let leftForm = document.getElementById('leftForm');
    leftForm.submit();
}

function removeItem(){
    let rightForm = document.getElementById('rightForm');
    rightForm.submit();
}