<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

// +----------------------------------------------------------------------+
// | Akelos Framework - http://www.akelos.org                             |
// +----------------------------------------------------------------------+
// | Copyright (c) 2002-2006, Akelos Media, S.L.  & Bermi Ferrer Martinez |
// | Released under the GNU Lesser General Public License, see LICENSE.txt|
// +----------------------------------------------------------------------+

/**
 * @package ActiveSupport
 * @subpackage Utils
 * @author Bermi Ferrer <bermi a.t akelos c.om>
 * @copyright Copyright (c) 2002-2006, Akelos Media, S.L. http://www.akelos.org
 * @license GNU Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 */

$mime_types = array(
'323 ' => 'text/h323',
'acutc' => 'application/vnd.acucorp',
'acx' => 'application/internet-property-stream',
'ai' => 'application/postscript',
'aif' => 'audio/x-aiff',
'aifc' => 'audio/x-aiff',
'aiff' => 'audio/x-aiff',
'ami' => 'application/vnd.amiga.amu',
'ani' => 'application/octet-stream',
'asc' => 'application/pgp',
'asf' => 'video/x-ms-asf',
'asr' => 'video/x-ms-asf',
'asx' => 'video/x-ms-asf',
'atc' => 'application/vnd.acucorp',
'au' => 'audio/basic',
'avi' => 'video/x-msvideo',
'axs' => 'application/olescript',
'bak' => 'application/x-trash',
'bas' => 'text/plain',
'bat' => 'application/x-msdos-program',
'bck' => 'application/VMSBACKUP',
'bcpio' => 'application/x-bcpio',
'bin' => 'application/octet-stream',
'bleep' => 'application/bleeper',
'bmp' => 'image/bmp',
'book' => 'application/x-maker',
'bpd' => 'application/vnd.hbci',
'bz2' => 'application/x-bzip2',
'c' => 'text/plain',
'c++' => 'text/plain',
'cat' => 'application/vnd.ms-pkiseccat',
'cc' => 'text/plain',
'ccc' => 'text/vnd.net2phone.commcenter.command',
'cdf' => 'application/x-cdf',
'cdy' => 'application/vnd.cinderella',
'cer' => 'application/x-x509-ca-cert',
'chrt' => 'application/vnd.kde.kchart',
'cil' => 'application/vnd.ms-artgalry',
'class' => 'application/octet-stream',
'clp' => 'application/x-msclip',
'cls' => 'text/x-tex',
'cmx' => 'image/x-cmx',
'cod' => 'image/cis-cod',
'com' => 'application/x-msdos-program',
'cpio' => 'application/x-cpio',
'cpp' => 'text/x-c++src',
'cpt' => 'application/mac-compactpro',
'crd' => 'application/x-mscardfile',
'crl' => 'application/pkix-crl',
'crt' => 'application/x-x509-ca-cert',
'cs' => 'text/plain',
'csh' => 'application/x-csh',
'csm' => 'application/cu-seeme',
'css' => 'text/css',
'csv' => 'text/comma-separated-values',
'cu' => 'application/cu-seeme',
'curl' => 'application/vnd.curl',
'cw' => 'application/prs.cww',
'cww' => 'application/prs.cww',
'cxx' => 'text/x-c++src',
'dcr' => 'application/x-director',
'deb' => 'application/x-debian-package',
'der' => 'application/x-x509-ca-cert',
'dfac' => 'application/vnd.dreamfactory',
'diff' => 'text/diff',
'dir' => 'application/x-director',
'dl' => 'video/dl',
'dll' => 'application/x-msdownload',
'dms' => 'application/octet-stream',
'doc' => 'application/msword',
'dot' => 'application/msword',
'dvi' => 'application/x-dvi',
'dxr' => 'application/x-director',
'ecelp4800' => 'audio/vnd.nuera.ecelp4800',
'ecelp7470' => 'audio/vnd.nuera.ecelp7470',
'ecelp9600' => 'audio/vnd.nuera.ecelp9600',
'emm' => 'application/vnd.ibm.electronic-media',
'eol' => 'audio/vnd.digital-winds',
'eps' => 'application/postscript',
'etx' => 'text/x-setext',
'evy' => 'application/envoy',
'exe' => 'application/octet-stream',
'ez' => 'application/andrew-inset',
'fb' => 'application/x-maker',
'fbdoc' => 'application/x-maker',
'fif' => 'application/fractals',
'fli' => 'video/fli',
'flo' => 'application/vnd.micrografx.flo',
'flr' => 'x-world/x-vrml',
'flw' => 'application/vnd.kde.kivio',
'fm' => 'application/x-maker',
'frame' => 'application/x-maker',
'frm' => 'application/x-maker',
'fsc' => 'application/vnd.fsc.weblauch',
'gf' => 'application/x-tex-gf',
'gif' => 'image/gif',
'gl' => 'video/gl',
'gsf' => 'application/x-font',
'gsm' => 'audio/x-gsm',
'gtar' => 'application/x-gtar',
'gz' => 'application/x-gzip',
'h' => 'text/plain',
'h++' => 'text/plain',
'hbc' => 'application/vnd.hbci',
'hbci' => 'application/vnd.hbci',
'hdf' => 'application/x-hdf',
'hh' => 'text/plain',
'hlp' => 'application/winhlp',
'hpgl' => 'application/vnd.hp-HPGL',
'hpp' => 'text/plain',
'hqx' => 'application/mac-binhex40',
'hta' => 'application/hta',
'htc' => 'text/x-component',
'htke' => 'application/vnd.kenameapp',
'htm' => 'text/html',
'html' => 'text/html',
'htt' => 'text/webviewhtml',
'hxx' => 'text/plain',
'ica' => 'application/x-ica',
'ice' => 'x-conference/x-cooltalk',
'ico' => 'image/x-icon',
'ics' => 'text/calendar',
'ief' => 'image/ief',
'ifb' => 'text/calendar',
'iges' => 'model/iges',
'igs' => 'model/iges',
'igx' => 'application/vnd.micrografx.igx',
'iii' => 'application/x-iphone',
'imagemap' => 'application/imagemap',
'imap' => 'application/imagemap',
'ins' => 'application/x-internet-signup',
'irp' => 'application/vnd.irepository.package+xml',
'isp' => 'application/x-internet-signup',
'jad' => 'text/vnd.sun.j2me.app-descriptor',
'jar' => 'application/x-jar',
'java' => 'text/x-java-source',
'jfif' => 'image/pipeg',
'jisp' => 'application/vnd.jisp',
'jpe' => 'image/jpeg',
'jpeg' => 'image/jpeg',
'jpg' => 'image/jpeg',
'js' => 'application/x-javascript',
'kar' => 'audio/midi',
'karbon' => 'application/vnd.kde.karbon',
'kfo' => 'application/vnd.kde.kformula',
'kom' => 'application/vnd.hbci',
'kon' => 'application/vnd.kde.kontour',
'ksp' => 'application/vnd.kde.kspread',
'kwd' => 'application/vnd.kde.kword',
'kwt' => 'application/vnd.kde.kword',
'latex' => 'application/x-latex',
'lbd' => 'application/vnd.llamagraphics.life-balance.desktop',
'les' => 'application/vnd.hhe.lesson-player',
'lha' => 'application/octet-stream',
'log' => 'text/plain',
'lrm' => 'application/vnd.ms-lrm',
'lsf' => 'video/x-la-asf',
'lsx' => 'video/x-la-asf',
'ltx' => 'text/x-tex',
'lvp' => 'audio/vnd.lucent.voice',
'lzh' => 'application/octet-stream',
'm13' => 'application/x-msmediaview',
'm14' => 'application/x-msmediaview',
'm3u' => 'audio/x-mpegurl',
'maker' => 'application/x-maker',
'man' => 'application/x-troff-man',
'mcd' => 'application/mathcad',
'mda' => 'application/vnd.ms-access',
'mdb' => 'application/x-msaccess',
'mde' => 'application/vnd.ms-access',
'mdf' => 'application/access',
'me' => 'application/x-troff-me',
'mesh' => 'model/mesh',
'mht' => 'message/rfc822',
'mhtml' => 'message/rfc822',
'mid' => 'audio/mid',
'midi' => 'audio/midi',
'mif' => 'application/x-mif',
'mml' => 'text/mathml',
'mny' => 'application/x-msmoney',
'moc' => 'text/x-moc',
'mov' => 'video/quicktime',
'movie' => 'video/x-sgi-movie',
'mp2' => 'video/mpeg',
'mp3' => 'audio/mpeg',
'mpa' => 'video/mpeg',
'mpc' => 'application/vnd.mophun.certificate',
'mpe' => 'video/mpeg',
'mpeg' => 'video/mpeg',
'mpega' => 'audio/mpeg',
'mpg' => 'video/mpeg',
'mpga' => 'audio/mpeg',
'mpm' => 'application/vnd.blueice.multipass',
'mpn' => 'application/vnd.mophun.application',
'mpp' => 'application/vnd.ms-project',
'mpv2' => 'video/mpeg',
'ms' => 'application/x-troff-ms',
'mseq' => 'application/vnd.mseq',
'msh' => 'model/mesh',
'mvb' => 'application/x-msmediaview',
'mxu' => 'video/vnd.mpegurl',
'nc' => 'application/x-netcdf',
'nim' => 'video/vnd.nokia.interleaved-multimedia',
'nws' => 'message/rfc822',
'o' => 'application/x-object',
'oda' => 'application/oda',
'old' => 'application/x-trash',
'oprc' => 'application/vnd.palm',
'p' => 'text/x-pascal',
'p10' => 'application/pkcs10',
'p12' => 'application/x-pkcs12',
'p7b' => 'application/x-pkcs7-certificates',
'p7c' => 'application/x-pkcs7-mime',
'p7m' => 'application/x-pkcs7-mime',
'p7r' => 'application/x-pkcs7-certreqresp',
'p7s' => 'application/x-pkcs7-signature',
'pac' => 'application/x-ns-proxy-autoconfig',
'pas' => 'text/x-pascal',
'patch' => 'text/diff',
'pbm' => 'image/x-portable-bitmap',
'pcf' => 'application/x-font',
'pcf.Z' => 'application/x-font',
'pdb' => 'application/vnd.palm',
'pdf' => 'application/pdf',
'pfa' => 'application/x-font',
'pfb' => 'application/x-font',
'pfr' => 'application/font-tdpfr',
'pfx' => 'application/x-pkcs12',
'pgb' => 'image/vnd.glocalgraphics.pgb',
'pgm' => 'image/x-portable-graymap',
'pgn' => 'application/x-chess-pgn',
'pgp' => 'application/pgp-signature',
'php' => 'application/x-httpd-php',
'php3' => 'application/x-httpd-php3',
'php3p' => 'application/x-httpd-php3-preprocessed',
'phps' => 'application/x-httpd-php3-source',
'pht' => 'application/x-httpd-php',
'phtml' => 'application/x-httpd-php',
'pk' => 'application/x-tex-pk',
'pkd' => 'application/vnd.hbci',
'pko' => 'application/ynd.ms-pkipko',
'pl' => 'application/x-perl',
'plb' => 'application/vnd.3gpp.pic-bw-large',
'plj' => 'audio/vnd.everad.plj',
'plt' => 'application/vnd.hp-HPGL',
'pm' => 'application/x-perl',
'pm5' => 'application/pagemaker',
'pma' => 'application/x-perfmon',
'pmc' => 'application/x-perfmon',
'pml' => 'application/x-perfmon',
'pmr' => 'application/x-perfmon',
'pmw' => 'application/x-perfmon',
'png' => 'image/png',
'pnm' => 'image/x-portable-anymap',
'po' => 'text/plain',
'pot' => 'application/vnd.ms-powerpoint',
'pot,' => 'application/vnd.ms-powerpoint',
'ppm' => 'image/x-portable-pixmap',
'pps' => 'application/vnd.ms-powerpoint',
'ppt' => 'application/vnd.ms-powerpoint',
'pqa' => 'application/vnd.palm',
'prc' => 'application/vnd.palm',
'prf' => 'application/pics-rules',
'ps' => 'application/postscript',
'ps-z' => 'application/postscript',
'psb' => 'application/vnd.3gpp.pic-bw-small',
'pt5' => 'application/pagemaker',
'pti' => 'application/vnd.pvi.ptid1',
'ptid' => 'application/vnd.pvi.ptid1',
'pub' => 'application/x-mspublisher',
'pvb' => 'application/vnd.3gpp.pic-bw-var',
'qt' => 'video/quicktime',
'qtl' => 'application/quicktimeplayer',
'qwd' => 'application/vnd.Quark.QuarkXPress',
'qwt' => 'application/vnd.Quark.QuarkXPress',
'qxb' => 'application/vnd.Quark.QuarkXPress',
'qxd' => 'application/vnd.Quark.QuarkXPress',
'qxl' => 'application/vnd.Quark.QuarkXPress',
'qxt' => 'application/vnd.Quark.QuarkXPress',
'ra' => 'audio/x-pn-realaudio',
'ram' => 'audio/x-pn-realaudio',
'rar' => 'application/x-rar-compressed',
'ras' => 'image/x-cmu-raster',
'rct' => 'application/prs.nprend',
'rdz' => 'application/vnd.data-vision.rdz',
'rgb' => 'image/x-rgb',
'rm' => 'audio/x-pn-realaudio',
'rmi' => 'audio/mid',
'rnd' => 'application/prs.nprend',
'roff' => 'application/x-troff',
'rpm' => 'audio/x-pn-realaudio-plugin',
'rss' => 'application/rss+xml',
'rtf' => 'application/rtf',
'rtx' => 'text/richtext',
'sav' => 'application/x-spss',
'sbs' => 'application/x-spss',
'sc' => 'application/vnd.ibm.secure-container',
'scd' => 'application/x-msschedule',
'sct' => 'text/scriptlet',
'setpay' => 'application/set-payment-initiation',
'setreg' => 'application/set-registration-initiation',
'sgm' => 'text/sgml',
'sgml' => 'text/sgml',
'sh' => 'application/x-sh',
'shar' => 'application/x-shar',
'shtml' => 'text/html',
'sik' => 'application/x-trash',
'silo' => 'model/mesh',
'sit' => 'application/x-stuffit',
'skd' => 'application/x-koan',
'skm' => 'application/x-koan',
'skp' => 'application/x-koan',
'skt' => 'application/x-koan',
'smi' => 'application/smil',
'smil' => 'application/smil',
'sms' => 'application/vnd.3gpp.sms',
'snd' => 'audio/basic',
'so' => 'application/octet-stream',
'soc' => 'application/sgml-open-catalog',
'spc' => 'application/x-pkcs7-certificates',
'spl' => 'application/futuresplash',
'spo' => 'application/x-spss',
'spp' => 'application/x-spss',
'sps' => 'application/x-spss',
'src' => 'application/x-wais-source',
'sst' => 'application/vnd.ms-pkicertstore',
'stc' => 'application/vnd.sun.xml.calc.template',
'std' => 'application/vnd.sun.xml.draw.template',
'sti' => 'application/vnd.sun.xml.impress.template',
'stk' => 'application/hyperstudio',
'stl' => 'application/vnd.ms-pkistl',
'stm' => 'text/html',
'stw' => 'application/vnd.sun.xml.writer.template',
'sty' => 'text/x-tex',
'sv4cpio' => 'application/x-sv4cpio',
'sv4crc' => 'application/x-sv4crc',
'swf' => 'application/x-shockwave-flash',
'swfl' => 'application/x-shockwave-flash',
'sxc' => 'application/vnd.sun.xml.calc',
'sxd' => 'application/vnd.sun.xml.draw',
'sxg' => 'application/vnd.sun.xml.writer.global',
'sxi' => 'application/vnd.sun.xml.impress',
'sxm' => 'application/vnd.sun.xml.math',
'sxw' => 'application/vnd.sun.xml.writer',
't' => 'application/x-troff',
'tar' => 'application/x-tar',
'tbk' => 'application/toolbook',
'tbz' => 'application/x-gtar',
'tbz2' => 'application/x-gtar',
'tcl' => 'application/x-tcl',
'tex' => 'application/x-tex',
'texi' => 'application/x-texinfo',
'texinfo' => 'application/x-texinfo',
'tgz' => 'application/x-compressed',
'tif' => 'image/tiff',
'tiff' => 'image/tiff',
'tk' => 'text/x-tcl',
'tr' => 'application/x-troff',
'trm' => 'application/x-msterminal',
'tsp' => 'application/dsptype',
'tsv' => 'text/tab-separated-values',
'txt' => 'text/plain',
'uls' => 'text/iuls',
'upa' => 'application/vnd.hbci',
'ustar' => 'application/x-ustar',
'vbk' => 'audio/vnd.nortel.vbk',
'vbs' => 'text/plain',
'vcd' => 'application/x-cdlink',
'vcf' => 'text/x-vcard',
'vcs' => 'text/calendar',
'vfb' => 'text/calendar',
'vis' => 'application/vnd.visionary',
'vrm' => 'x-world/x-vrml',
'vrml' => 'x-world/x-vrml',
'vsc' => 'application/vnd.vidsoft.vidconference',
'vsd' => 'application/vnd.visio',
'wav' => 'audio/x-wav',
'wax' => 'audio/x-ms-wax',
'wbmp' => 'image/vnd.wap.wbmp',
'wbxml' => 'application/vnd.wap.wbxml',
'wcm' => 'application/vnd.ms-works',
'wdb' => 'application/vnd.ms-works',
'wk' => 'application/x-123',
'wks' => 'application/vnd.ms-works',
'wm' => 'video/x-ms-wm',
'wma' => 'audio/x-ms-wma',
'wmd' => 'application/x-ms-wmd',
'wmf' => 'application/x-msmetafile',
'wml' => 'text/vnd.wap.wml',
'wmlc' => 'application/vnd.wap.wmlc',
'wmls' => 'text/vnd.wap.wmlscript',
'wmlsc' => 'application/vnd.wap.wmlscriptc',
'wmv' => 'video/x-ms-wmv',
'wmx' => 'video/x-ms-wmx',
'wmz' => 'application/x-ms-wmz',
'wp' => 'application/wordperfect',
'wp5' => 'application/wordperfect5.1',
'wp6' => 'application/wordperfect6.1',
'wpd' => 'application/wordperfectd',
'wpl' => 'application/vnd.ms-wpl',
'wps' => 'application/vnd.ms-works',
'wrd' => 'application/msword',
'wri' => 'application/x-mswrite',
'wrl' => 'x-world/x-vrml',
'wrz' => 'x-world/x-vrml',
'wvx' => 'video/x-ms-wvx',
'wz' => 'application/x-Wingz',
'x_b' => 'model/vnd.parasolid.transmit.binary',
'x_t' => 'model/vnd.parasolid.transmit.text',
'xaf' => 'x-world/x-vrml',
'xbm' => 'image/x-xbitmap',
'xfdf' => 'application/vnd.adobe.xfdf',
'xht' => 'application/xhtml+xml',
'xhtml' => 'application/xhtml+xml',
'xla' => 'application/vnd.ms-excel',
'xlc' => 'application/vnd.ms-excel',
'xlm' => 'application/vnd.ms-excel',
'xls' => 'application/vnd.ms-excel',
'xlt' => 'application/vnd.ms-excel',
'xlw' => 'application/vnd.ms-excel',
'xml' => 'application/xml',
'xmt_bin' => 'model/vnd.parasolid.transmit.binary',
'xmt_txt' => 'model/vnd.parasolid.transmit.text',
'xof' => 'x-world/x-vrml',
'xpm' => 'image/x-xpixmap',
'xsl' => 'text/xml',
'xul' => 'application/vnd.mozilla.xul+xml',
'xwd' => 'image/x-xwindowdump',
'xyz' => 'chemical/x-xyz',
'z' => 'application/x-compress',
'zip' => 'application/zip'

);

?>