document.getElementById("addPlace").addEventListener("click", function() {
    const additionalItems = document.getElementById("additionalItems");
    const newPlace = document.createElement("div");
    newPlace.id = 'additionalPackage'
    newPlace.innerHTML = `
              <svg width="100%" height="3" viewBox="0 0 650 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="650" height="3" fill="#575757"/>
              </svg>
                <br>
                <br>
                <label class="calculator__inner-form-label" for="additionalWeight">Weight, kg</label>
                <input class="calculator__inner-form-input" type="number" name="additionalWeight" step="1" min="1" required>

                <label class="calculator__inner-form-label" for="additionalLength">Length, centimeters</label>
                <input class="calculator__inner-form-input" type="number" name="additionalLength" step="1" min="1" required>
                
                <label class="calculator__inner-form-label" for="additionalWidth">Width, centimeters</label>
                <input class="calculator__inner-form-input"  type="number" name="additionalWidth" step="1" min="1" required>
                
                <label class="calculator__inner-form-label" for="additionalHeight">Height, centimeters</label>
                <input class="calculator__inner-form-input"  type="number" name="additionalHeight" step="1" min="1" required>
            `;
    additionalItems.appendChild(newPlace);
});

document.getElementById("deliveryForm").addEventListener("submit", function(event) {
    event.preventDefault();
    const departureCountry = document.getElementById("departureCountry").value;
    const destinationCountry = document.getElementById("destinationCountry").value;
    const numberOfItems = parseInt(document.getElementById("numberOfItems").value);
    const weight = parseFloat(document.getElementById("weight").value);
    const length = parseFloat(document.getElementById("length").value);
    const width = parseFloat(document.getElementById("width").value);
    const height = parseFloat(document.getElementById("height").value);

    let cost = 0;

    const volumetricWeight = (length * width * height) / 4000;

    const actualWeight = Math.max(weight, volumetricWeight);

    if (departureCountry === "Ireland" && destinationCountry === "Ukraine") {
        if (actualWeight > 10) {
            cost = actualWeight * 2.5
        } else if (actualWeight <= 10) {
            cost += 25
        }

    } else if (departureCountry === "Ukraine" && destinationCountry === "Ireland") {
        if (actualWeight > 10) {
            cost = actualWeight * 3;
        }
        else if (actualWeight <= 10) {
            cost += 30;
        }
    }

    let elementsArray = Array.from(document.querySelectorAll('#additionalPackage'));
    elementsArray.forEach(function (element) {
        let inputWeight = element.querySelector('input[name="additionalWeight"]').value;
        let inputLength = element.querySelector('input[name="additionalLength"]').value;
        let inputWidth = element.querySelector('input[name="additionalWidth"]').value;
        let inputHeight = element.querySelector('input[name="additionalHeight"]').value;
        const volumetricWeight = (inputLength * inputWidth * inputHeight) / 4000;
        const actualWeight = Math.max(inputWeight, volumetricWeight);
        if (departureCountry === "Ireland" && destinationCountry === "Ukraine") {
            if (actualWeight > 10) {
                cost += actualWeight * 2.5
            } else if (actualWeight <= 10) {
                cost += 25
            }

        } else if (departureCountry === "Ukraine" && destinationCountry === "Ireland") {
            if (actualWeight > 10) {
                cost += actualWeight * 3;
            }
            else if (actualWeight <= 10) {
                cost += 30;
            }
        }
    });

    document.getElementById("result").innerHTML = `Shipping cost:  ${cost}euro <br><br>
    <div>* This amount is approximate, the final cost is determined upon delivery of the parcel</div>
    `;

});


document.getElementById("addPlace").addEventListener("click", function() {
    const numberOfItemsDiv = document.getElementById("numberOfItems");

    const currentValue = parseInt(numberOfItemsDiv.textContent);
    let value = currentValue + 1;

    numberOfItemsDiv.innerHTML= `${value}`
});