/*! PhotoSwipe - v4.1.3 - 2019-01-08
* http://photoswipe.com
* Copyright (c) 2019 Dmitry Semenov; */
// 



/**
 * Aimeos detail related Javascript code
 *
 * @license LGPLv3, https://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2014-2020
 */


/**
 * Aimeos catalog detail actions
 */
AimeosCatalogDetail = {

	fetchReviews(container) {

		const jsonUrl = $(".catalog-detail").data("jsonurl");
		const prodid = $(container).data("productid");

		if(prodid && jsonUrl) {

			fetch(jsonUrl, {
				method: "OPTIONS",
				headers: {'Content-type': 'application/json'}
			}).then(response => {
				return response.json();
			}).then(options => {

				if(options && options.meta && options.meta.resources && options.meta.resources.review) {

					const args = {
						filter: {f_refid: prodid},
						sort: "-ctime"
					};
					let params = {};
					let url;

					if(options.meta.prefix) {
						params[options.meta.prefix] = args;
					} else {
						params = args;
					}

					url = new URL(options.meta.resources.review);
					url.search = url.search ? url.search + '&' + window.param(params) : '?' + window.param(params);

					fetch(url, {
						headers: {'Content-type': 'application/json'}
					}).then(response => {
						return response.json();
					}).then(response => {
						AimeosCatalogDetail.addReviews(response, container);
					});


					args['aggregate'] = 'review.rating';

					if(options.meta.prefix) {
						params[options.meta.prefix] = args;
					} else {
						params = args;
					}

					url = new URL(options.meta.resources.review);
					url.search = url.search ? url.search + '&' + window.param(params) : '?' + window.param(params);

					fetch(url, {
						headers: {'Content-type': 'application/json'}
					}).then(response => {
						return response.json();
					}).then(response => {
						if(response && response.data) {
							const ratings = $(".rating-dist", container).data("ratings") || 1;

							response.data.forEach(function(entry) {
								const percent = (entry.attributes || 0) * 100 / ratings;
								$("#rating-" + (entry.id || 0)).val(percent).text(percent);
							});
						}
					});
				}
			});
		}
	},


	addReviews(response, container) {

		if(response && response.data) {

			const template = $(".review-item.prototype", container);
			const more = $(".review-list .more", container);
			const list = $(".review-items", container);

			response.data.forEach(entry => {
				item = AimeosCatalogDetail.updateReview(entry, template);
				list.append(item);

				let height = item.innerHeight();

				$(":scope > *:not(.review-show)", item).each((idx, el) => {
					height -= $(el).outerHeight(true);
				});

				if(height >= 0) {
					$(".review-show", item).hide();
				}
			});

			if(response.links && response.links.next) {
				more.attr("href", response.links.next).addClass("show");
			} else {
				more.removeClass("show");
			}
		}
	},


	updateReview(entry, template) {

		const response = (entry.attributes['review.response'] || '').replace(/</g, '&lt;').replace(/>/g, '&gt;');
		const comment = (entry.attributes['review.comment'] || '').replace(/</g, '&lt;').replace(/>/g, '&gt;');
		const date = new Date(entry.attributes['review.ctime'] || '');
		const cnt = parseInt(entry.attributes['review.rating'], 10);
		const item = template.clone().removeClass("prototype");
		const symbol = $(".review-rating", item).text();

		if(response) {
			$(".review-response", item).html($(".review-response", item).html() + response.replace(/\n+/g, '<br/>'));
		} else {
			$(".review-response", item).remove();
		}

		$(".review-comment", item).html(comment.replace(/\n+/g, '<br/>'));
		$(".review-name", item).text(entry.attributes['review.name'] || '');
		$(".review-rating", item).text(symbol.repeat(cnt || 1));
		$(".review-ctime", item).text(date.toDateString());

		return item;
	},


	/**
	 * Opens the lightbox with big images
	 */
	onOpenLightbox() {

		$(".catalog-detail-image").on("click", ".image-single .item", ev => {

			const list = [];
			const vwidth = $(window).width();
			const gallery = $(ev.delegateTarget);
			const pswp = $(".pswp", gallery);
			const options = $(gallery).data("options") || {};

			if( pswp.length === 0 ) {
				console.log( 'No element with class .pswp for PhotoSwipe found' );
				return false;
			}

			$(".image-single .item", gallery).each((idx, item) => {
				list.push({
					msrc: $(item).attr("src"),
					src: $(item).data("zoom"),
					pid: idx,
					h: 0,
					w: 0
				});
			});

			gallery._photoswipe = new PhotoSwipe(pswp[0], PhotoSwipeUI_Default, list, options);
			gallery._photoswipe.init();

			gallery._photoswipe.listen("imageLoadComplete", (idx, item) => {

				if( item.w === 0 && item.h === 0 ) {
					const imgpreload = new Image();

					imgpreload.onload = function() {
						item.w = this.width;
						item.h = this.height;
						gallery._photoswipe.updateSize(true);
					};

					imgpreload.src = item.src;
				}
			});
		});
	},


	/**
	 * Single and thumbnail image slider
	 */
	onSelectThumbnail() {
		
			$('.slider-nav').on("click", ev => {
				$(".catalog-detail-image .thumbs img").removeClass('active');
			});

			
			$(".catalog-detail-image .thumbs img").on("click", (ev) => {
				
				$(".catalog-detail-image .thumbs img").removeClass('active');
				$(ev.currentTarget).addClass('active');
				const index = $(ev.currentTarget).data('index');
				const sliderElement = document.querySelector('.catalog-detail-image div:first-child');
				swiffyslider.slideTo(sliderElement, index);
				

			});
		},


	/**
	 * Initializes the slide in/out for block prices
	 */
	onTogglePrice() {

		$(".catalog-detail-basket .price-item:not(.price-item:first-of-type)").hide();

		$('.catalog-detail-basket .price-list').on("click", ev => {
			$(".price-item").toggleClass('toggle-js');
			$(".price-item:not(.price-item:first-of-type)", ev.currentTarget).each((idx, el) => {
				slideToggle(el, 300);
			});
		});
	},


	/**
	 * Initializes the slide in/out for delivery/payment services
	 */
	onToggleServices() {

		$(".catalog-detail-service .service-list").hide();

		$('.catalog-detail-service').on("click", ev => {
			$(".service-list", ev.currentTarget).each((idx, el) => {
				slideToggle(el, 300);
			});
		});
	},


	/**
	 * Initializes loading reviews
	 */
	onShowReviews() {

		const list = document.querySelectorAll('.catalog-detail-additional .reviews');

		if(list.length > 0) {
			if('IntersectionObserver' in window) {
				let observer = new IntersectionObserver((entries, observer) => {
					for(let entry of entries) {
						if(entry.isIntersecting) {
							observer.unobserve(entry.target);
							AimeosCatalogDetail.fetchReviews(list[0]);
						}
					}
				},{
					threshold: 0.01
				});


				observer.observe(list[0]);
			}
		} else {
			AimeosCatalogDetail.fetchReviews(list[0]);
		}
	},


	/**
	 * Initializes loading more reviews
	 */
	onMoreReviews() {

		$(".catalog-detail-additional .reviews").on("click", ".more", ev => {
			ev.preventDefault();

			fetch($(ev.currentTarget).attr("href"), {
				headers: {'Content-type': 'application/json'}
			}).then(response => {
				return response.json();
			}).then(response => {
				if(response && response.data) {
					AimeosCatalogDetail.addReviews(response, ev.delegateTarget);
				}
			});
		});
	},


	/**
	 * Initializes sorting reviews
	 */
	onSortReviews() {

		$(".catalog-detail-additional .reviews").on("click", ".sort .sort-option", ev => {
			ev.preventDefault();

			fetch($(ev.currentTarget).attr("href"), {
				headers: {'Content-type': 'application/json'}
			}).then(response => {
				return response.json();
			}).then(response => {
				if(response && response.data) {
					const reviews = $(".review-items", ev.delegateTarget);
					const prototype = $(".prototype", reviews);

					reviews.empty().append(prototype);
					AimeosCatalogDetail.addReviews(response, ev.delegateTarget);

					$(".sort-option", ev.delegateTarget).removeClass("active");
					$(ev.currentTarget).addClass("active");
				}
			});

			return false;
		});
	},


	/**
	 * Initializes expanding reviews
	 */
	onExpandReviews() {

		$(".catalog-detail-additional .reviews").on("click", ".review-show", ev => {

			$(ev.currentTarget).parents(".review-item").css('max-height', 'fit-content');
			$(ev.currentTarget).hide();
			ev.preventDefault();
		});
	},


	/**
	 * Adds products to the basket without page reload
	 */
	onAddBasket() {

		$(document).on("submit", ".product form.basket", ev => {
			Aimeos.createOverlay();

			fetch($(ev.currentTarget).attr("action"), {
				body: new FormData(ev.currentTarget),
				method: 'POST'
			}).then(response => {
				return response.text();
			}).then(data => {
				Aimeos.createContainer(AimeosBasket.updateBasket(data));
			});

			return false;
		});
	},

	imageClickHover() {

		const container =document.getElementById("Rightside-image");
		const zoomImage =  document.querySelector("img.right-show-image");
		
       
		// new method --start
			let startX, startY, translateX, translateY;
						
			$(zoomImage).on('mousedown',function(e){
				
				startX = e.clientX - e.offsetX ;
				startY = e.clientY - e.offsetY ;
				translateX = parseFloat(getComputedStyle(zoomImage).getPropertyValue('left')) ;
				translateY = parseFloat(getComputedStyle(zoomImage).getPropertyValue('top'));
			})

			$(container).on('mousemove', function(e){
				if (zoomImage.classList.contains('zoom-in')) {
					const dx = startX - e.clientX  ;
					const dy = startY - e.clientY  ;
					zoomImage.style.left = translateX + dx + 'px';
					zoomImage.style.top =   translateY + dy + 'px';
				}
			})

			const insideImage =  document.querySelector("img.right-show-image");

			

			$('img.right-show-image').on('click',function (){

				$(this).toggleClass('normal-zoom zoom-in');

				if (!zoomImage.classList.contains('zoom-in')) {
					zoomImage.style.removeProperty("left");
					zoomImage.style.removeProperty("top");
				}
			})

			

		// new method --end


    },


	/**
	 * Initializes the catalog detail actions
	 */
	init() {
		this.onOpenLightbox();
		this.onSelectThumbnail();

		this.onToggleServices();
		this.onTogglePrice();

		this.onExpandReviews();
		this.onMoreReviews();
		this.onShowReviews();
		this.onSortReviews();

		this.onAddBasket();
		this.imageClickHover();
	}
};



/**
 * Setup the JS for the catalog detail section
 */
$(function() {
	AimeosCatalogDetail.init();
});



// modal start
function openModal() {
	document.getElementById("myModal").style.display = "block";
}

function closeModal() {
	document.getElementById("myModal").style.display = "none";
}
function onSelectThumbnail() {

	$(".modal .thumbs img").on("click", (ev) => {
		const index = $(ev.currentTarget).data('index');
		const sliderElement = document.querySelector('.modal div:first-child');
		swiffyslider.slideTo(sliderElement, index);
	});
}

// select item-thumb show
function changeSRC(thisObj) {
	var BIGPIC = document.querySelectorAll('.item-thumb')[0];
	var BIGPICsrc = BIGPIC.src;
	var slash = "/";
	var splitSRC = document.querySelectorAll('.item-thumb')[0].src.split(slash);
	var lastelementofBIGsrc = splitSRC.length - 1;

	var splitsmallSRC = thisObj.src.split(slash);
	var lastelementofSMALLsrc = splitsmallSRC.length - 1;

	var BIGPICsrcnew = BIGPICsrc.replace(splitSRC[lastelementofBIGsrc], "");
	thisObj.style.cursor = "pointer";

	document.querySelectorAll(".right-show-image")[0].src = BIGPICsrcnew + splitsmallSRC[lastelementofSMALLsrc];

	const bigPic =  document.querySelector("img.right-show-image");
	 bigPic.style.removeProperty("left");
	 bigPic.style.removeProperty("top");
	$(bigPic).removeClass('zoom-in');
	$(bigPic).addClass('normal-zoom');
}



