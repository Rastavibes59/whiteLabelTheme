
function fillOrderModal(modalItem) {

    const orderName = modalItem.data('name');
    const orderPrice = modalItem.data('price');
    const orderDate = modalItem.data('date');
    const orderModal = $('#orderModal');

    const namePlaceholders = orderModal.find('.orderName');
    const pickupDate = orderModal.find('.pickupDate');

    namePlaceholders.each(function() {
        $(this).html(orderName);
    })

    
    const from = orderDate.split("/");
    const f = from[2] + '-'+ from[1] + '-'+ from[0];
    pickupDate.attr('min', f);
}

/* FILL ORDER FORM */

let messageInitiated = false;


function fillOrderForm(textarea, content) {
    const orderName = content.find('.orderName').html();
    const orderQuantity = content.find('#quantity').val();
    const orderDelivery = content.find('#delivery').val();
    const orderDate = content.find('#pickupDate ').val();
    const orderSMS = content.find('#sms').find('input').val();
    const messageStart = 'Je souhaite commander : \n';
    let orderMessage = '';
    const messageEnd = orderSMS ? 'Je souhaite recevoir les informations de disponibilité des produits par SMS' + orderDelivery + ',\n' : 'Je ne souhaites pas recevoir les informations de disponibilité des produits par SMS' + orderDelivery + ',\n';

    if(!messageInitiated ) {
        textarea.val('');
        orderMessage += messageStart;
        orderMessage += messageEnd;
        messageInitiated = true;
    }

    orderMessage += '- ' + orderQuantity + ' ' + orderName  + ' à partir du ' + orderDate + ',\n';

    const curValue = textarea.val();

    const newValue = curValue + orderMessage;

    textarea.val(newValue);

    closeModal($('#orderModal'));


}
