(function($) {
    $.fn.lazyload = function(options) {
        var settings = {
            threshold: 0,
            failurelimit: 0,
            event: "scroll",
            effect: "show",//默认效果为show
            container: window
        };
        if (options) {
            $.extend(settings, options);
        }
        var elements = this;


        if ("scroll" == settings.event) {
            $(settings.container).bind("scroll", function(event) {
                var counter = 0;
                elements.each(function() {

                    if ($.abovethetop(this, settings)
                        //|| $.leftofbegin(this, settings)
                        ) {
                        self.loaded = false;
                    }
                    else if (!$.belowthefold(this, settings) ){
                        // !$.rightoffold(this, settings)) {
                        self.loaded = false;
                        $(this).trigger("appear");
                    }
                    else {
                        self.loaded = true;
                        if (counter++ > settings.failurelimit) {
                            return false;
                        }
                    }
                });

                var temp = $.grep(elements, function(element) {
                    return !element.loaded;
                });
                elements = $(temp);
            });
        }



        this.each(function() {
            var self = this;

            //if (settings.placeholder) {
	    //$(self).attr("src", settings.placeholder);
	    //}

            $(self).one("appear", function() {
                if (!this.loaded) {
                    $("<img />")
                        .bind("load", function() {
                            $(self)
                                .hide()
                                .attr("src", $(self).attr("original"))
                                [settings.effect](settings.effectspeed);
                            self.loaded = true;
                        })
                        .attr("src", $(self).attr("original"));
                };
            });

            if ("scroll" != settings.event) {
                $(self).bind(settings.event, function(event) {
                    if (!self.loaded) {
                        $(self).trigger("appear");	//在每一个匹配的元素上触发某类事件
                    }
                });
            }
        });
        $(settings.container).trigger(settings.event);
        return this;

    };



    $.belowthefold = function(element, settings) {
        if (settings.container === undefined || settings.container === window) {
            var fold = $(window).height() + $(window).scrollTop();
        } else {
            var fold = $(settings.container).offset().top + $(settings.container).height();	//取得第一个匹配元素当前计算的高度值（px）。
        }
        return fold <= $(element).offset().top - settings.threshold;
    };

    $.rightoffold = function(element, settings) {
        if (settings.container === undefined || settings.container === window) {
            var fold = $(window).width() + $(window).scrollLeft();
        } else {
            var fold = $(settings.container).offset().left + $(settings.container).width();
        }
        return fold <= $(element).offset().left - settings.threshold;
    };

    $.abovethetop = function(element, settings) {
        if (settings.container === undefined || settings.container === window) {
            var fold = $(window).scrollTop();	//获取匹配元素相对滚动条顶部的偏移。
        } else {
            var fold = $(settings.container).offset().top;	//获取匹配元素在当前视口的相对偏移  返回的对象包含两个整型属性：top 和 left。此方法只对可见元素有效。
        }
        return fold >= $(element).offset().top + settings.threshold + $(element).height();
    };

    $.leftofbegin = function(element, settings) {
        if (settings.container === undefined || settings.container === window) {
            var fold = $(window).scrollLeft();	//获取匹配元素相对滚动条左侧的偏移
        } else {
            var fold = $(settings.container).offset().left;//获取匹配元素在当前视口的相对偏移
        }
        return fold >= $(element).offset().left + settings.threshold + $(element).width();	//取得第一个匹配元素当前计算的宽度值
    };


    $.extend($.expr[':'], {
        "below-the-fold": "$.belowthefold(a, {threshold : 0, container: window})",
        "above-the-fold": "!$.belowthefold(a, {threshold : 0, container: window})",
        "right-of-fold": "$.rightoffold(a, {threshold : 0, container: window})",
        "left-of-fold": "!$.rightoffold(a, {threshold : 0, container: window})"
    });
})(jQuery);