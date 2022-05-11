//let home_url = "https://www.sdpmonitoring.com/WCC_BRY/";
let home_url = "http://localhost/rs_fitness/";
let image_url = home_url + "backend/framework/uploads/images/";
let base_url = home_url + "backend/framework/controllers/";
let months = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"];

function fireAjax(path, payload, is_multi) {
    $('body').preloader({
        text: 'Loading. Please wait...',
        percent: '',
        duration: '',
        zIndex: '',
        setRelative: true

    });
    return new Promise(function (resolve, reject) {

        if (is_multi) {
            $.ajax({

                method: 'POST',
                url: base_url + path,
                data: payload,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('body').preloader('remove');
                    resolve(data);
                },
                error: function (err) {
                    $('body').preloader('remove');
                    reject(err);
                }
            })
        } else {
            $.ajax({

                method: 'POST',
                url: base_url + path,
                data: payload,
                success: function (data) {
                    $('body').preloader('remove');
                    resolve(data);
                },
                error: function (err) {
                    $('body').preloader('remove');
                    reject(err);
                }
            })
        }
    });
}

function fireSwal(swalTitle, swalBody, swalIcon) {
    Swal.fire({
        title: swalTitle,
        text: swalBody,
        icon: swalIcon,
        allowOutsideClick: false,
        allowEscapeKey: false
    })
}

function calculateBMI(user_height, user_weight) {
    let h = 0;
    let w = 0;

    w = user_weight * 0.453592;
    h = user_height * 0.01;

    let bmi = w / (h * h);
    return bmi;
}

function clasifyBMI(bmi) {
    if (bmi < 18.5) {
        return "Underweight";
    } else if (bmi < 25) {
        return "Normal";
    } else if (bmi < 30) {
        return "Overweight";
    } else {
        return "Obese";
    }
}