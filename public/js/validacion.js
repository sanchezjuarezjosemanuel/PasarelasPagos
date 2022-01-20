const validate = async() => {
    const cardNumberCheck = RealexRemote.validateCardNumber(document.getElementById('cardNumber').value);
    const cardHolderNameCheck = RealexRemote.validateCardHolderName(document.getElementById('cardholderName').value);
    const expiryDate = document.getElementById('expiryDateMM').value.concat(document.getElementById('expiryDateYY').value);

    const expiryDateFormatCheck = RealexRemote.validateExpiryDateFormat(expiryDate);
    const expiryDatePastCheck = RealexRemote.validateExpiryDateNotInPast(expiryDate);
    if (document.getElementById('cardNumber').value.charAt(0) == "3") {
        cvnCheck = RealexRemote.validateAmexCvn(document.getElementById('cvn').value);
    } else {
        cvnCheck = RealexRemote.validateCvn(document.getElementById('cvn').value);
    }

    if (cardNumberCheck == false || cardHolderNameCheck == false || expiryDateFormatCheck == false || expiryDatePastCheck == false || cvnCheck == false) {
        // code here to inform the cardholder of an input error and prevent the form submitting
        await alert("Fallo algun dato de su targeta")
        return false;
    } else {
        data = {
            cardNumber: cardNumberCheck,
            expiryDateMM: expiryDate,
            expiryDateYY: document.getElementById('expiryDateYY').value,
            cvn: cvnCheck,
        }
        const res = await response("/addonpayPost", data);
        console.log(res)

    }

}

const response = async(url, body) => {
    const res = await fetch(url, {
        method: "POST",
        body,
        headers: {
            "content-type": "application/json",
            'X-CSRF-TOKEN': token
        },
    })

    return res;
}
