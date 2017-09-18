(function ($) {


    $(function () {
        $('.doequel.equalheight').getEqualHeight(); // add class with selector class equalheight
    });

    $(function () {
        $('.footerLink .equalheight').getEqualHeight(); // add class with selector class equalheight
    });
    $(function () {
        $('#section3 .productFeatureBoxInner').getEqualHeight(); // add class with selector class equalheight
    });

    $(function () {
        $('.contactBoxBranch').getEqualHeight(); // add class with selector class equalheight
    });


    /**
     * Set all elements within the collection to have the same height.
     * tanimCoded 10 12 2013
     * uses ->
     $(function () {
        	$('.newsBox.equalheight').getEqualHeight(); // add class with selector class equalheight
    	});
     */
    var _0x8e8a = ["\x65\x71\x75\x61\x6C\x48\x65\x69\x67\x68\x74", "\x66\x6E", "\x62\x6F\x78\x2D\x73\x69\x7A\x69\x6E\x67", "\x63\x73\x73", "\x62\x6F\x72\x64\x65\x72\x2D\x62\x6F\x78", "\x2D\x6D\x6F\x7A\x2D\x62\x6F\x78\x2D\x73\x69\x7A\x69\x6E\x67", "\x69\x6E\x6E\x65\x72\x48\x65\x69\x67\x68\x74", "\x68\x65\x69\x67\x68\x74", "\x70\x75\x73\x68", "\x65\x61\x63\x68", "\x61\x70\x70\x6C\x79", "\x6D\x61\x78", "\x65\x71\x75\x61\x6C\x48\x65\x69\x67\x68\x74\x47\x72\x69\x64", "\x61\x75\x74\x6F", "\x6C\x65\x6E\x67\x74\x68", "\x61\x64\x64", "\x64\x65\x74\x65\x63\x74\x47\x72\x69\x64\x43\x6F\x6C\x75\x6D\x6E\x73", "\x74\x6F\x70", "\x6F\x66\x66\x73\x65\x74", "\x67\x65\x74\x45\x71\x75\x61\x6C\x48\x65\x69\x67\x68\x74", "\x6C\x6F\x67", "\x72\x65\x73\x69\x7A\x65\x20\x6C\x6F\x61\x64", "\x62\x69\x6E\x64"];
    $[_0x8e8a[1]][_0x8e8a[0]] = function () {
        var _0xc6eax1 = [];
        $[_0x8e8a[9]](this, function (_0xc6eax2, _0xc6eax3) {
            $element = $(_0xc6eax3);
            var _0xc6eax4;
            var _0xc6eax5 = ($element[_0x8e8a[3]](_0x8e8a[2]) == _0x8e8a[4]) || ($element[_0x8e8a[3]](_0x8e8a[5]) == _0x8e8a[4]);
            if (_0xc6eax5) {
                _0xc6eax4 = $element[_0x8e8a[6]]();
            } else {
                _0xc6eax4 = $element[_0x8e8a[7]]();
            }
            ;
            _0xc6eax1[_0x8e8a[8]](_0xc6eax4);
        });
        this[_0x8e8a[7]](Math[_0x8e8a[11]][_0x8e8a[10]](window, _0xc6eax1));
        return this;
    };
    $[_0x8e8a[1]][_0x8e8a[12]] = function (_0xc6eax6) {
        var _0xc6eax7 = this;
        _0xc6eax7[_0x8e8a[3]](_0x8e8a[7], _0x8e8a[13]);
        for (var _0xc6eax2 = 0; _0xc6eax2 < _0xc6eax7[_0x8e8a[14]]; _0xc6eax2++) {
            if (_0xc6eax2 % _0xc6eax6 == 0) {
                var _0xc6eax8 = $(_0xc6eax7[_0xc6eax2]);
                for (var _0xc6eax9 = 1; _0xc6eax9 < _0xc6eax6; _0xc6eax9++) {
                    _0xc6eax8 = _0xc6eax8[_0x8e8a[15]](_0xc6eax7[_0xc6eax2 + _0xc6eax9]);
                }
                ;
                _0xc6eax8[_0x8e8a[0]]();
            }
            ;
        }
        ;
        return this;
    };
    $[_0x8e8a[1]][_0x8e8a[16]] = function () {
        var _0xc6eaxa = 0, _0xc6eaxb = 0;
        this[_0x8e8a[9]](function (_0xc6eax2, _0xc6eaxc) {
            var _0xc6eaxd = $(_0xc6eaxc)[_0x8e8a[18]]()[_0x8e8a[17]];
            if (_0xc6eaxa == 0 || _0xc6eaxd == _0xc6eaxa) {
                _0xc6eaxb++;
                _0xc6eaxa = _0xc6eaxd;
            } else {
                return false;
            }
            ;
        });
        return _0xc6eaxb;
    };
    $[_0x8e8a[1]][_0x8e8a[19]] = function () {
        var _0xc6eaxe = this;

        function _0xc6eaxf() {
            var _0xc6eaxb = _0xc6eaxe[_0x8e8a[16]]();
            console[_0x8e8a[20]](_0xc6eaxb);
            _0xc6eaxe[_0x8e8a[12]](_0xc6eaxb);
        };
        $(window)[_0x8e8a[22]](_0x8e8a[21], _0xc6eaxf);
        _0xc6eaxf();
        return this;
    };

})(jQuery);
