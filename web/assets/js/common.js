var CSRFTOKEN=$("meta[name=csrf-token]").attr("content");
var CSRFPARAM=$("meta[name=csrf-param]").attr("content");
var WEBID=$("meta[name=WEBID]").attr("content");
var HOSTINFO=$("meta[name=HOSTINFO]").attr("content");
var SOURCEPATH=HOSTINFO+$("meta[name=SOURCEPATH]").attr("content");
var ajaxing=false;
var _lm=
{
    valide:'',
    format:'',
};
//console.log('WEBID:'+WEBID);
//console.log('HOSTINFO:'+HOSTINFO);
//console.log('SOURCEPATH:'+SOURCEPATH);


_lm.valide = (function ($) {
    var pub = {
        isEmpty: function (value) {
            return value === null || value === undefined || value == [] || value === '';
        },
        isNum: function (value) {
            var reg = /^\d+(\.\d+)?$/;

            if(!reg.test(value))
            {
                return false;
            }

            return true;
        },
        tel : function (value) {
            var regu = /^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|17[0-9]{9}$|18[0-9]{9}$/;
            var re = new RegExp(regu);
            if (!re.test(value)) {
                return false;
            }
            return true;
        },

        string: function (value, min, max) {
            if (typeof value !== 'string') {
                return;
            }
            if (min !== undefined && value.length < min) {
                return false;
            }
            if (max !== undefined && value.length > max) {
                return false;
            }
        },
        number: function (value,min,max) {
            if (typeof value === 'string') {
                return false;
            }
            if (min !== undefined && value < min) {
                return false;
            }
            if (max !== undefined && value > options.max) {
                return false;
            }
        },
        email: function (value) {
            var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
            if(!reg.test(value))
            {
                return false;
            }
            return true;
        },

        trim: function (value,skipOnEmpty) {
            return $.trim(value);
        },

        compare: function (value) {
        },

        ip: function (value) {
        }
    };
    return pub;
})(jQuery);

_lm.format = (function ($) {
    var pub = {

        money: function (value,n) {

            n = n > 0 && n <= 20 ? n : 2;
            value = parseFloat((value + "").replace(/[^\d\.-]/g, "")).toFixed(n) + "";
            var l = value.split(".")[0].split("").reverse(),
                r = value.split(".")[1];
            t = "";
            for(i = 0; i < l.length; i ++ )
            {
                t += l[i] + ((i + 1) % 3 == 0 && (i + 1) != l.length ? "," : "");
            }
            return t.split("").reverse().join("") + "." + r;

        },

        date : function (value) {



        }
    };
    return pub;
})(jQuery);