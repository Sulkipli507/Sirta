$(".tab-wizard").steps({
	headerTag: "h5",
	bodyTag: "section",
	transitionEffect: "fade",
	titleTemplate: '<span class="step">#index#</span> #title#',
	labels: {
		finish: "Submit"
	},
	onStepChanged: function (event, currentIndex, priorIndex) {
		$('.steps .current').prevAll().addClass('disabled');
	},
	onFinished: function (event, currentIndex) {
		// Mengambil data dari form
		var formData = new FormData($('#thesis-form')[0]);
		
		// Mengirim data ke server
		$.ajax({
			type: 'POST',
			url: "/thesis/store",
			data: formData,
			processData: false,
			contentType: false,
			success: function(response) {
				$('#success-modal-btn').trigger('click');
			},
			error: function(xhr, status, error, response) {    
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    for (var key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            var errorMessage = errors[key][0];
                            // Menampilkan pesan kesalahan di masing-masing input
                            $('[name="' + key + '"]').addClass('is-invalid');
                            $('[name="' + key + '"]').after('<span class="invalid-feedback" role="alert"><strong>' + errorMessage + '</strong></span>');
                        }
                    }
                }
            }
		});
	}
});

$(".tab-wizard2").steps({
	headerTag: "h5",
	bodyTag: "section",
	transitionEffect: "fade",
	titleTemplate: '<span class="step">#index#</span> <span class="info">#title#</span>',
	labels: {
		finish: "Submit",
		next: "Next",
		previous: "Previous",
	},
	onStepChanged: function(event, currentIndex, priorIndex) {
		$('.steps .current').prevAll().addClass('disabled');
	},
	onFinished: function(event, currentIndex) {
		var formData = $(".tab-wizard2").serialize(); // Mengambil data form
        $.ajax({
            type: "POST",
            url: "{{ route('register') }}", // Sesuaikan dengan URL register di Laravel
            data: formData,
            success: function (response) {
                if (response.status === 'success') {
                    $('#success-modal-btn').trigger('click'); // Menampilkan modal setelah berhasil
                } else {
                    // Handle error jika diperlukan
                }
            },
            error: function () {
                // Handle error jika terjadi kesalahan dalam pengiriman data
            }
        });
	}
});
