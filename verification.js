function verify_name()
{
    let fm = document.querySelector('input[name="first_name"]').value;
    let lm = document.querySelector('input[name="last_name"]').value;
    if(fm.length < 6 || lm.length < 6)
    {
        alert("Please enter a first name and last name with at least 6 characters");
    }
}

function verify_no()
{
    let num = document.querySelector('input[name="contact_no"]').value;

    if(num>10 || num<10)
    {
        alert("Please enter a valid contact number");
    }
}
