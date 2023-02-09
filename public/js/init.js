let home_type = document.getElementById('loan_type_home');
let cash_type = document.getElementById('loan_type_cash');
let home_block = document.querySelector('.home')
let cash_block = document.querySelector('.cash')

if (home_type && home_type.checked == true) {
    home_block.style.display = 'block';
}

if (cash_type &&  cash_type.checked == true) {
    cash_block.style.display = 'block';
}

if (home_type || cash_type) {
    home_type.addEventListener('change', function () {
        if (this.checked == true) {
            home_block.style.display = 'block';
        } else {
            home_block.style.display = 'none';
        }
    })

    cash_type.addEventListener('change', function () {
        if (this.checked == true) {
            cash_block.style.display = 'block';
        } else {
            cash_block.style.display = 'none';
        }
    })
}

let success = document.querySelector('.success')

if (success) {
    setTimeout(() => {
        success.style.display = 'none';
    },5000)
}

