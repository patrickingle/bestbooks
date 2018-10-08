jQuery(document).ready(function($){
	processPayment = function(token,id,email) {
		$.ajax({
			url: '$ajax_url',
			type: 'post',
			data: {
				'action': 'stripejs_process',
				'token': token,
				'id': id,
				'email': email,
				'amount': $stripejs_atts[amount],
				'description': '$stripejs_atts[description]'
			},
			success: function(results){
				createCookie('stripe-response',results,1);
				var charge = $.parseJSON(results);
				if (charge.status == "succeeded") {
					window.location = "$success_url";
				} else {
					window.location = "$failure_url";
				}
			}
		});
	}
            
        stripeCheckout = function() {
            // Open Checkout with further options:
            var billing = $stripejs_atts[billing];
            if (billing != false) {
                handler.open({
                    name: '$stripejs_atts[name]',
                    description: '$stripejs_atts[description]',
                    amount: $stripejs_atts[amount],
                    email: $('#payment-form-email').val(),
                    shippingAddress: $stripejs_atts[billing],
                    billingAddress: $stripejs_atts[shipping],
                });
            } else {
                handler.open({
                    name: '$stripejs_atts[name]',
                    description: '$stripejs_atts[description]',
                    amount: $stripejs_atts[amount],
                    email: $('#payment-form-email').val(),
                });
            }
        }

        $('#$stripejs_atts[id]').bind('click',function(evt){
            stripeCheckout();
        });
                
});
            
function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        var expires = "; expires=" + date.toUTCString();
    }
    else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}

var handler = StripeCheckout.configure({
	key: '',
	image: '',
	locale: 'auto',
	token: function(token) {
		// You can access the token ID with `token.id`.
		// Get the token ID to your server-side code for use.
		processPayment(token,token.id,token.email);
	}
});
// Close Checkout on page navigation:
window.addEventListener('popstate', function() {
  handler.close();
});
