$(document).ready(function () {
	menuComponent.init()
	header.init()
	owlCarousel.init()
	rangeSliderJs.init()
	amountProduct.init()
	expandEvent.init()
	tabEvent.init()
	countdownJs.init()
	countUpConfig.init()
  rating.init()
  modalImage.init()
  comment.init()
    quiz.init()
    quiz_result.init()
    anotherAddress.init()
});

const menuComponent = {
	init: function () {
		this.setupMenu('.dropdown-menu')
		this.setupMenu('.sub-menu-wrapper')
		this.toggleCategory()
		this.checkShowMenuDefault()
	},
	setupMenu: function (target) {
		var $menu = $(target);
		$menu.menuAim({
			activate: activateSubmenu,
			deactivate: deactivateSubmenu
		});

		function activateSubmenu(row) {
			var $row = $(row),
				submenuId = $row.data("submenuId"),
				$submenu = $("#" + submenuId),
				height = $menu.outerHeight(),
				width = $menu.outerWidth();

			$submenu.css({
				display: "block",
				top: -1,
				left: width - 3,
				height: height - 4
			});

			$row.find("a").addClass("maintainHover");
		}

		function deactivateSubmenu(row) {
			var $row = $(row),
				submenuId = $row.data("submenuId"),
				$submenu = $("#" + submenuId);

			$submenu.css("display", "none");
			$row.find("a").removeClass("maintainHover");
		}
		$(`${target} li`).click(function (e) {
			e.stopPropagation();
		});

		$(`.menu__category ${target}`).mouseleave(function () {
			$(".popover").css("display", "none");
			$("a.maintainHover").removeClass("maintainHover");
		})

		$(document).click(function () {
			$(".popover").css("display", "none");
			$("a.maintainHover").removeClass("maintainHover");
		});
	},
	toggleCategory: function () {
		const categoryBtn = document.querySelector('.menu-category')
		categoryBtn.addEventListener('click', () => {
			categoryBtn.classList.toggle('active')
		})
	},
	checkShowMenuDefault: function () {
		const categoryBtn = document.querySelector('.menu-category')
		const isOpenCategory = document.querySelector('#isOpenCategory')
		if (isOpenCategory) {
			categoryBtn.classList.add('active')
		} else {
			categoryBtn.classList.remove('active')
		}
	},
}

const header = {
	init: function () {
		// this.eventSeenProducts()
		this.menuMobile()
		this.stickyMenuMobile()
	},
	eventSeenProducts: function () {
		const btn = document.querySelector('#seen-products')
		const main = document.querySelector('.seen-products-wrapper')
		btn.addEventListener('click', () => {
			main.classList.toggle('active')
		})
	},
	menuMobile: function () {
		const menuTarget = document.querySelector('.menu-mobile-component')
		const btnOpenMenu = document.querySelector('.header-mobile .header-btn.menu')
		const navOpenMenu = document.querySelector('.nav-mobile .header-btn.menu')
		const btnCloseMenu = menuTarget.querySelector('.menu-close')

		btnOpenMenu?.addEventListener('click', () => {
			menuTarget.classList.add('active')
		})
		navOpenMenu?.addEventListener('click', () => {
			menuTarget.classList.add('active')
		})
		btnCloseMenu.addEventListener('click', () => {
			menuTarget.classList.remove('active')
		})
	},
	stickyMenuMobile: function() {
		const menuTarget = document.querySelector('.menu-component')
		if (menuTarget) {
			window.addEventListener('scroll', () => {
				if (window.scrollY > 48.77) menuTarget.classList.add('sticky')
				else menuTarget.classList.remove('sticky')
			})
		}
	},
}



const owlCarousel = {
    init: function () {
        this.setupHomeBannerCarousel()
        this.setupCarouselSectionProduct()
        this.setupCarouselProductLists()
        this.setupCarouselSectionEvent()
        this.setupCarouselSectionBanner()
        this.setupCarouselSectionCourseDetail()
        this.setupCarouselSectionCourseResult()
        this.setupCarouselSectionCourseResult2()
        this.setupCarouselSectionCourseCreator()
        this.setupCarouselSectionTeacher()
    },
    setupCarouselSectionCourseDetail: function () {
        const owlPreview = $("#course-preview-carousel").owlCarousel({
            responsive: {
                0: {
                    items: 1
                },
            },
            loop: false,
            dots: false,
            nav: false,
            touchDrag: false,
            mouseDrag: false,
            autoHeight: true,
            margin: 0,
        });

        const owlControl = $("#course-control-carousel").owlCarousel({
            responsive: {
                0: {
                    items: 3
                },
                425: {
                    items: 4
                },
                512: {
                    items: 5
                },
            },
            loop: false,
            dots: false,
            margin: 5,
            nav: false,
        });

        const owlControlButton = document.querySelectorAll('#course-control-carousel .course-carousel-item')
        if (owlControlButton.length !== 0) {
            owlControlButton[0].classList.add('active')
            owlControlButton.forEach((item, index) => item.addEventListener('click', () => {
                owlControlButton.forEach(i => i.classList.remove('active'))
                item.classList.add('active')
                owlPreview.trigger('to.owl.carousel', [index, 200])
            }))
        }
    },
    setupHomeBannerCarousel: function () {
        // $("#home-banner-carousel").owlCarousel({
        //     responsive: {
        //         0: {
        //             items: 1
        //         },
        //     },
        //     loop: true,
        //     autoplay: true,
        //     autoplayTimeout: 4000,
        //     autoHeight: true,
        //     autoplayHoverPause: true,
        //     smartSpeed: 300,
        //     dots: true,
        //     nav: false,
        //     margin: 0,
        //     lazyload: true,
        // });
    },
    setupCarouselSectionBanner: function () {
        $("#section-banner-carousel").owlCarousel({
            responsive: {
                0: {
                    items: 1
                },
            },
            loop: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            smartSpeed: 300,
            dots: true,
            nav: false,
            margin: 00,
        });
    },
    setupCarouselSectionProduct: function () {
        $("section.section-product.product .owl-carousel").owlCarousel({
            responsive: {
                0: {
                    items: 2
                },
                575: {
                    items: 2
                },
                768: {
                    items: 3
                },
                991: {
                    items: 4
                },
                1200: {
                    items: 5
                },
            },
            loop: false,
            dots: false,
            nav: true,
            navText: ['<span><img src="/enduser/assets/icons/icon-angle-left-gray.svg" alt=""/></span>', '<span><img src="/enduser/assets/icons/icon-angle-right-gray.svg" alt=""/></span>'],
            margin: 15,
        });
    },
    setupCarouselSectionEvent: function() {
        $("section.section-events .owl-carousel").owlCarousel({
            responsive: {
                0: {
                    items: 2
                },
                575: {
                    items: 2
                },
                768: {
                    items: 3
                },
            },
            loop: false,
            dots: false,
            nav: true,
            navText: ['<span><img src="/enduser/assets/icons/icon-angle-left-gray.svg" alt=""/></span>', '<span><img src="/enduser/assets/icons/icon-angle-right-gray.svg" alt=""/></span>'],
            margin: 15,
        });
    },
    setupCarouselProductLists: function() {
        $("section.section-product.product-lists-carousel .owl-carousel").owlCarousel({
            responsive: {
                0: {
                    items: 2
                },
                575: {
                    items: 2
                },
                768: {
                    items: 3
                },
            },
            loop: false,
            dots: false,
            nav: true,
            navText: ['<span><img src="/enduser/assets/icons/icon-angle-left-gray.svg" alt=""/></span>', '<span><img src="/enduser/assets/icons/icon-angle-right-gray.svg" alt=""/></span>'],
            margin: 15,
        });
    },
    setupCarouselSectionCourseResult: function () {
        $("#result-carousel-section").owlCarousel({
            responsive: {
                0: {
                    items: 1
                },
                575: {
                    items: 2
                },
                768: {
                    items: 3
                },
            },
            navText: ["<img src='/enduser/assets/icons/icon-angle-left.svg' />","<img src='/enduser/assets/icons/icon-angle-right.svg' />"],
            loop: false,
            dots: false,
            nav: true,
            margin: 15,
        });
    },
    setupCarouselSectionCourseResult2: function () {
        $("#result-carousel-section-2").owlCarousel({
            responsive: {
                0: {
                    items: 2
                },
                575: {
                    items: 3
                },
                768: {
                    items: 4
                },
            },
            navText: ["<img src='/enduser/assets/icons/icon-angle-left.svg' />","<img src='/enduser/assets/icons/icon-angle-right.svg' />"],
            loop: false,
            dots: false,
            nav: true,
            margin: 15,
        });
    },
    setupCarouselSectionCourseCreator: function () {
        $("#creator-carousel-section").owlCarousel({
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
            },
            navText: ["<img src='/enduser/assets/icons/icon-angle-left.svg' />","<img src='/enduser/assets/icons/icon-angle-right.svg' />"],
            loop: false,
            dots: false,
            nav: true,
            margin: 15,
        });
    },
    setupCarouselSectionTeacher: function() {
        $("#carousel-section-teachers").owlCarousel({
            responsive: {
                0: {
                    items: 1
                },
                575: {
                    items: 2
                },
                991: {
                    items: 3
                },
            },
            loop: false,
            dots: true,
            nav: false,
            margin: 15,
        });
    },
}


function numberWithCommas(x) {
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

const rangeSliderJs = {
	init: function () {
		this.setupJRange()
	},
	setupJRange: function () {
		const main = document.querySelector('.filter-price-range')
		if (main) {
			const minValue = main.querySelector('#minValue')
			const maxValue = main.querySelector('#maxValue')
			const fromValue = 100000
			const toValue = 1000000

			const target = $('.range-slider').jRange({
				from: fromValue,
				to: toValue,
				step: 1,
				theme: 'theme-red',
				format: (value) => numberWithCommas(value),
				width: 'auto',
				showLabels: false,
				isRange: true,
				onstatechange: (data) => {
					const values = data.split(',')
					minValue.innerHTML = `${numberWithCommas(values[0])}đ`
					maxValue.innerHTML = `${numberWithCommas(values[1])}đ`
				}
			});
			target.jRange('setValue', `${fromValue},${toValue}`)
		}
	},
}

const amountProduct = {
	init: function () {
		this.setupEvent()
	},
	setupEvent: function () {
		const main = document.querySelectorAll('.amount-action')
		if (main.length !== 0) {
			main.forEach((item) => {
				const increaseBtn = item.querySelector('#amountPlus')
				const decreaseBtn = item.querySelector('#amountMinus')
				const value = item.querySelector('#amountValue')

				increaseBtn.addEventListener('click', (e) => {
					e.preventDefault();
					var num = Number(value.innerHTML) + 1;
					value.innerHTML = num;
				    $(increaseBtn).parents('.amount-action').children("input[type='hidden']").val(num);
                    $(increaseBtn).parents("form").submit();
				})

				decreaseBtn.addEventListener('click', (e) => {
					e.preventDefault()
                    var num = Number(value.innerHTML);
					if (num === 0) return
                    num = Number(value.innerHTML) - 1;
					value.innerHTML = num;
                    $(decreaseBtn).parents('.amount-action').children("input[type='hidden']").val(num);
                    $(decreaseBtn).parents("form").submit();
				})
			})
		}
	}
}

const expandEvent = {
	init: function () {
		this.setupExpandEvent()
	},
	setupExpandEvent: function () {
		const expandClick = document.querySelectorAll('.expand-click')
		const expandMain = document.querySelectorAll('.expand-target')

		if (expandClick.length === expandMain.length) {
			expandClick.forEach((item, index) => item.addEventListener('click', () => {
				expandClick[index].classList.toggle('active')
				expandMain[index].classList.toggle('active')
			}))
		}
	}
}

const tabEvent = {
	init: function () {
		this.setupTabEvent()
	},
	setupTabEvent: function () {
		const main = document.querySelectorAll('.tab-wrapper')
		if (main.length !== 0) {
			main.forEach((mainTarget) => {
				const tabClick = mainTarget.querySelectorAll('.tabs-group .tab-item')
				const tabMain = mainTarget.querySelectorAll('.tabs-main-group .tab-item')

				tabClick.forEach((item, index) => item.addEventListener('click', () => {
					tabClick.forEach(i => i.classList.remove('active'))
					tabMain.forEach(i => i.classList.remove('active'))

					tabClick[index].classList.add('active')
					tabMain[index].classList.add('active')
				}))
			})
		}
	}
}

const countdownJs = {
	init: function() {
		this.config()
	},
	config: function() {
		const countdownTarget = document.querySelectorAll('.countdownJs')
		if (countdownTarget.length !== 0) {
			countdownTarget.forEach((item) => {
				setInterval(() => {
					const date = countdown(new Date(item.dataset.date)).toString()
					item.innerHTML = `Đang diễn ra: ${date}`
				}, 1000)
			})
		}
	}
}

const countUpConfig = {
  init: function() {
    this.configCountUpOpportunitiesSection()
  },
  configCountUpOpportunitiesSection: function() {
    const dataCountElements = [
      { targetHTML: '#countUp-hoc-vien'},
      { targetHTML: '#countUp-bai-giang'},
      { targetHTML: '#countUp-bai-giang-da-ban'},
      { targetHTML: '#countUp-thu-nhap'},
    ]
    this.setupScrollEvent('.become-teacher-section.discover', dataCountElements)
  },
  setupScrollEvent: function(targetHTML, elementsCountUp) {
    const target = document.querySelector(targetHTML)
    if (target) {
      const options = {
        threshold: 1,
        rootMargin: "0px",
      };
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) {
                return;
            } else {
              elementsCountUp.forEach((item) => {
								const target = document.querySelector(item.targetHTML).dataset.count
								this.setupCountUp(item.targetHTML, target)
							})
              observer.unobserve(entry.target);
            }
        })
      }, options);
      observer.observe(target);
    }
  },
  setupCountUp(targetId, number) {
    const options = {
      startVal: 0,
      duration: 5,
    }
    const target = document.querySelector(targetId)
    const countUpObj = new CountUp(target, number, options)
    countUpObj.start()
  }
}

const rating = {
  init: function() {
    this.config()
  },
  config: function() {
    const ratingMain = document.querySelectorAll('.js-rating-star')
    const imageStar = './assets/icons/icon-star-yellow.svg'
    const imageStarFill = './assets/icons/icon-star-fill-yellow.svg'

    const renderStar = (main, elements, value, isSet = true) => {
      for (let i = 1; i <= elements.length; i++) {
        if (i <= value) elements[i - 1].src = imageStarFill
        else elements[i - 1].src = imageStar
      }
      if (isSet) main.setAttribute('data-rating', value)
    }

    const defaultRatingStar = (main, elements) => {
      let value = main.dataset.rating || 0
      renderStar(main, elements, value)
    }

    const eventClickRatingStar = (main, elements) => {
      elements.forEach((star, indexStar) => star.addEventListener('click', () => {
        value = indexStar + 1
        renderStar(main, elements, value)
      }))
    }

    const eventHoverRatingStar = (main, elements) => {
      elements.forEach((star, indexStar) => star.addEventListener('mouseenter', () => {
        value = indexStar + 1
        renderStar(main, elements, value, false)
      }))

      main.addEventListener('mouseleave', () => {
        defaultRatingStar(main, elements)
      })
    }

    ratingMain.forEach((item) => {
      const imgStars = item.querySelectorAll('img')
      defaultRatingStar(item, imgStars)
      eventClickRatingStar(item, imgStars)
      eventHoverRatingStar(item, imgStars)
    })
  }
}

const modalImage = {
  init: function() {
    this.configGalleryImage()
  },
  configGalleryImage() {
    $('.js-gallery-item').magnificPopup({
      type: 'image',
      gallery:{
        enabled: true,
      }
    });
  }
}

const comment = {
  init: function() {
    this.expandReplyComment()
  },
  expandReplyComment: function() {
    const commentWrapper = document.querySelector('.comment-users-lists')

    if (commentWrapper) {
      const commentGroup = commentWrapper.querySelectorAll('.comment-item')
      commentGroup.forEach((item) => {
        const replyBtn = item.querySelector('.action-item.reply')
        const replyGroup = item.querySelector('.comment-reply-group')

        replyBtn.addEventListener('click', () => {
          replyGroup.classList.toggle('active')
        })
      })
    }
  }
}
const quiz = {
    init: function() {
        this.paginatge()
    },
    paginatge: function() {
        const main = document.querySelector('.quiz-wrapper')
        if (main) {
            const allQuiz = main.querySelectorAll('.quiz-wrapper-item')
            const quizTotalText = main.querySelector('.quiz-total h5')
            const quizList = main.querySelectorAll('.quiz-lists .quiz-list-item')
            const quizPrev = main.querySelectorAll('.quiz-action .prev')
            const quizNext = main.querySelectorAll('.quiz-action .next')

            const totalQuiz = allQuiz.length
            let currentQuiz = 0

            const isCheckedQuiz = (target) => {
                const allAnswer = target.querySelectorAll('.quiz-answers .answer-item input')
                let isChecked = false
                allAnswer.forEach((item) => {
                    if (item.checked) isChecked = true
                })

                return isChecked
            }
            const changeQuiz = () => {
                allQuiz.forEach((item, index) => {
                    item.classList.remove('active')
                    if (index === currentQuiz) {
                        quizList[index].className = 'quiz-list-item current'
                        item.classList.add('active')
                    } else if (isCheckedQuiz(item)) {
                        quizList[index].className = 'quiz-list-item done'
                    } else {
                        quizList[index].className = 'quiz-list-item undone'
                    }

                })
                quizTotalText.innerHTML = `Câu hỏi ${currentQuiz + 1} / ${totalQuiz}`
            }

            quizList.forEach((item, index) => item.addEventListener('click', () => {
                currentQuiz = index
                changeQuiz()
            }))

            quizPrev.forEach((item, index) => item.addEventListener('click', (e) => {
                e.preventDefault()
                if (currentQuiz !== 0) {
                    currentQuiz--
                    changeQuiz()
                }
            }))

            quizNext.forEach((item, index) => item.addEventListener('click', (e) => {
                e.preventDefault()
                if (currentQuiz < totalQuiz - 1) {
                    currentQuiz++
                    changeQuiz()
                }
            }))

            changeQuiz()
        }
    }
}
const quiz_result = {
    init: function() {
        this.paginatge()
    },
    paginatge: function() {
        const main = document.querySelector('.quiz-result')
        if (main) {
            const allQuiz = main.querySelectorAll('.quiz-wrapper-item')
            const quizTotalText = main.querySelector('.quiz-total h5')
            const quizList = main.querySelectorAll('.quiz-lists .quiz-list-item')
            const quizPrev = main.querySelectorAll('.quiz-action .prev')
            const quizNext = main.querySelectorAll('.quiz-action .next')

            const totalQuiz = allQuiz.length
            let currentQuiz = 0

            const isCheckedQuiz = (target) => {
                const allAnswer = target.querySelectorAll('.quiz-answers .answer-item input')
                let isChecked = false
                allAnswer.forEach((item) => {
                    if (item.checked) isChecked = true
                })

                return isChecked
            }
            const changeQuiz = () => {
                allQuiz.forEach((item, index) => {
                    item.classList.remove('active')
                    // if (index === currentQuiz) {
                    //     quizList[index].className = 'quiz-list-item current'
                    //     item.classList.add('active')
                    // } else if (isCheckedQuiz(item)) {
                    //     quizList[index].className = 'quiz-list-item done'
                    // } else {
                    //     quizList[index].className = 'quiz-list-item undone'
                    // }
                    if (index === currentQuiz) {
                      //  quizList[index].className = 'quiz-list-item current'
                        item.classList.add('active')
                    }else{
                      //  quizList[index].className = 'quiz-list-item undone';
                    }
                })
                quizTotalText.innerHTML = `Câu hỏi ${currentQuiz + 1} / ${totalQuiz}`
            }

            quizList.forEach((item, index) => item.addEventListener('click', () => {
                currentQuiz = index
                changeQuiz()
            }))

            quizPrev.forEach((item, index) => item.addEventListener('click', (e) => {
                e.preventDefault()
                if (currentQuiz !== 0) {
                    currentQuiz--
                    changeQuiz()
                }
            }))

            quizNext.forEach((item, index) => item.addEventListener('click', (e) => {
                e.preventDefault()
                if (currentQuiz < totalQuiz - 1) {
                    currentQuiz++
                    changeQuiz()
                }
            }))

            changeQuiz()
        }
    }
}
$(".clear_compo").on('click', function () {
    var v= $(this).parents(".reset_compo").children(".hidden_price").val();
    $(".course-price").text(v + " đ");
    $("input[name='compo_id']").val(0);
    $(".course-options .course-option-item").removeClass("active");
});
const anotherAddress = {
    init: function() {
        this.showHideAddress()
    },
    showHideAddress: function() {
        const btn = document.querySelector('.another-address-action')
        const main = document.querySelector('.another-address-wrapper')
        const addressList = document.querySelector('.address-list-wrapper')

        if (btn && main) {
            btn.addEventListener('click', (e) => {
                e.preventDefault()
                main.classList.toggle('active');
                if (addressList.style.display != "none") {
                    addressList.classList.toggle('hide');
                    addressList.style.display = 'none';
                    $("input[name='typeAddress']").val(0);
                }else{
                    addressList.style.display = '';
                    $("input[name='typeAddress']").val(1);
                }

                this.resetAddress();

                console.log(addressList.style.display)
            });

        }
    },
    resetAddress : function(){
        if($(".another-address-wrapper").hasClass("active")){
            $("input[name='address_id']").prop('checked', false);
        }
    }
}
// active tab by Phong
$( document ).ready(function() {
    // var arrContentTab = $(".tabs-main-group .pos_tab .tab-item");
    // var tabButton = $(".tabs-group .tab-item ");
    // var arrTop = [];
    // var heightWin = $( window  ).height();
    // console.log(arrTop);
    // $.each(arrContentTab, function(i, e){
    //     var el = $(e);
    //     var top = el.offset().top;
    //     el.attr('data-offset', top);
    //     arrTop.push(top);
    // });
   // console.log(arrTop);
    $( window ).scroll(function() {
        var arrContentTab = $(".tabs-main-group .pos_tab");
        var tabButton = $(".tabs-group .tab-item ");
        var arrTop = [];
        $.each(arrContentTab, function(i, e){
            var el = $(e);
            var top = el.offset().top;
            el.attr('data-offset', top);
            arrTop.push(top);
        });
        let scroll =  $(window).scrollTop();
        var indexActive = 0;
        $.each(arrTop, function(i, e){
            var off = e - 50;
            console.log(scroll,off);

            if( scroll >  off){
                indexActive = i;
            }
        });
        activeButtonActiveByIndex(tabButton, indexActive);
    });
    function activeButtonActiveByIndex(tabButton, index){
        $(".tabs-group .tab-item").removeClass("active");
        $.each(tabButton, function(i, e){
            if(i == index){
                $(e).addClass("active");
            }
        });
    }
});

document.querySelectorAll('a.my-tab-item').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('data-href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

$("#custom-carousel-new").owlCarousel({
    items: 2,
    navText: ['<span><img src="/enduser/assets/icons/icon-angle-left-gray.svg" alt=""/></span>', '<span><img src="/enduser/assets/icons/icon-angle-right-gray.svg" alt=""/></span>'],
    loop: false,
    dots: false,
    nav: true,
    margin: 15,
});

function reply(t, parent_id){
    var name = $(t).parents(".comment-item").find(".comment-info").stop().find(".comment-name.sub1").text();
    $("#frmComment textarea").val('');
    $("#frmComment textarea").val(name);
    $("#frmComment textarea").focus();
    $("input[name='parent_id']").val(parent_id);

    var offset = $("#frmComment textarea").offset();
    var top = offset.top;
    $( document ).scrollTop( top - 50 );
}
$("#frmComment textarea").keyup(function(){
    var value = $(this).val();
    if(value.length <= 0){
        $("input[name='parent_id']").val(0);
    }
})


