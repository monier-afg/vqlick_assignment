
// validate contact Form

function validateAddNewItem(){

    // The Form
    const theForm = document.getElementById('addNewItemForm');

    // Form Inputs
    const itemName = theForm.itemName;


    // Error message hlper block
    const helpBlockItemName = document.getElementById('helpBlockItemName');
    console.log(itemName);
    // name 

        // empty
        if(itemName.value == '' || itemName.value.length == 0){
            itemName.classList.add('border-danger');
            helpBlockItemName.innerText = 'Please enter item name!';
            return false;
        }
        else{
            itemName.classList.remove('border-danger');
            helpBlockItemName.innerText = '';
        }

    return true;
}
