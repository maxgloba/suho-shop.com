//= partials/popup.js

const wooNotices = document.querySelector('.woocommerce-notices-wrapper')
if(wooNotices) wooNotices.innerHTML = ' ';

const fields = document.querySelectorAll('.woocommerce-billing-fields .form-row')
fields.forEach(field => {
  let priority = field.dataset.priority
  field.style.order = priority;
})


const
  address = document.getElementById('billing_address_1_field'),
  city = document.getElementById('billing_city_field'),
  deliveryArr = ['Новая почта', 'Укрпочта', 'Justin'],
  deliveryBox = document.createElement("div")
  deliveryBox.classList.add('delivery'),
  deliveryFun = () => {
    deliveryBox.innerHTML = '';
    deliveryArr.forEach((item, i) => {
      let
        input = document.createElement("input")
        label = document.createElement("label")

      input.setAttribute("type", "radio")
      input.setAttribute("name", "delivery")
      input.setAttribute("id", `delivery_${i}`)
      input.value = item
      if(i == 0) input.setAttribute("checked", true)

      label.innerHTML = item
      label.setAttribute("for", `delivery_${i}`)

      deliveryBox.appendChild(input)
      deliveryBox.appendChild(label)
    })

    address.appendChild(deliveryBox)
    setBillingAddress()
    address.style.display = 'block';
    city.style.display = 'block';
  },
  setBillingAddress = () => {
    const deliveryRadios = document.querySelectorAll('[name="delivery"]')
    deliveryRadios.forEach(radio => {
      if(radio.checked) document.getElementById('billing_address_1').value = radio.value;

      radio.addEventListener('change', e => {
        e.preventDefault();
        if(radio.checked){
          document.getElementById('billing_address_1').value = radio.value;
        }
      });
    })
  }

address.style.display = 'none';
city.style.display = 'none';

setTimeout(deliveryFun, 1000)

document.getElementById('billing_city').addEventListener('change', deliveryFun);