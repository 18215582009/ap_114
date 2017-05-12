<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">


<html lang="en">

<head>
	<link rel="stylesheet" type="text/css" href="../main.css">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	<meta name="Author" content="Dave Shapiro">
	<meta name="Keywords" content="RSA; JavaScript; Cryptography; Encryption; Public Key; Infinite Precision; Multiple Precision; Arbitrary Precision; Barrett; Dave Shapiro; David Shapiro; Number Theory">
	<title>RSA In JavaScript - ohdave.com</title>

<script language="JavaScript" src="BigInt.js"></script>

<script language="JavaScript" src="Barrett.js"></script>

<script language="JavaScript" src="RSA_Stripped.js"></script>

<script language="JavaScript">
<!--

var key;

function bodyLoad()
{
	setMaxDigits(262);
	key = new RSAKeyPair(
		// Public exponent extracted from private_key.pem using
		// openssl rsa -inform PEM -text -noout < private_key.pem
		// Or extracted from public key PEM file using
		// openssl rsa -pubin -inform PEM -text -noout < public_key.pem
		"10001",
		
		// Dummy decryption exponent -- actual value only kept on server.
		"10001",

		// Modulus extracted from private key PEM file using
		// openssl rsa -inform PEM -modulus -noout < private_key.pem
		// Or extracted from public key PEM file using
		// openssl rsa -pubin -inform PEM -modulus -noout < public_key.pem
		"EEBBF18C31E0531E2ECEED9D247AEBE1E3BE37F4A105621818ABB3BF75DACDC3DB7D3BCD2E279E09CE81AFD2CD313C8A199434B6C8CA245340234EDD6CBF6BD5FC34F58225EBB01FECD47247A66F240ED06CCC8E9C7C20C76EE552BFE3B7907DF536B141B5EA07AF383976C5ED021A92CD274DA5238DF3C8C4208753D862922FA27C2111A0EA43E538377AEE1A3140E07C3B0B80303BD9D6A0841BD8DD91C648FFF96DDFD27115FAE8A740FEBE730740079D8708A7B572B4FFAD1F554470B85C62E8FC5160A0B44B84BFEC7A44B640550ABAAB7AB7EE43336F44E081408CF28C22DAA3D2710923C27621E07748DAB3C7CD1A689C93BFE4F48C1C31D401A31C09",
		
		// Key size in bits.
	 	2048
	);
}

function cmdEncryptClick()
{
	var ciphertext = encryptedString(key, document.frmInput.txtPlaintext.value,
		RSAAPP.PKCS1Padding, RSAAPP.RawEncoding);
	// ciphertext is a string composed of the raw binary data. base-64 encode it.
	document.frmSender.ciphertext.value = window.btoa(ciphertext);
	document.frmSender.submit();
}

// -->
</script>

</head>

<body onload="bodyLoad()">
	
	<table cellpadding="0" cellspacing="0" border="0" width="100%" style="padding-right:10px">
		<tr valign="top" width="100%">
			<td align="left">
				<span class="maintitle"><a href="/">ohdave.com</a></span>
				<span class="titlehumor">Equal parts Joe Diffie and Diffie-Hellman</span>
			</td>
			<td align="right" class="linx">
				<a href="/dashboard">dashboard</a>
				|
				<a href="/contact.php">contact</a>
				|
				<a target="_new" href="http://twitter.com/daveohdave">twitter</a>
			</td>
		</tr>
	</table>
	
<!-- Main section. -->
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr valign="top" width="100%">

<!-- Left column. -->
<td width="65%" class="leftcolumn">
	<div class="leftcolumnheading">
		RSA in JavaScript <span style="color:red">v2</span> &ndash; <i>now with padding!</i>
	</div>

	<h3>Background</h3>
	<p>
		In 1998, I wrote a multiple-precision math library in JavaScript. At the time, this was just an exercise in
		coding-for-the-joy-of-it. To test the library's validity, I implemented a few routines to do simple RSA
		encryption/decryption. Since this was just a proof-of-concept, I wasn't concerned with how the data got
		encoded/decoded...but apparently I should have been.
	</p>

	<p>
		As it turns out, people were interested in using this stuff. Some folks have
		<a href="http://www.codeproject.com/aspnet/rasinterop.asp">written articles</a> about it, and others have actually
		<a href="https://web.archive.org/web/20071113225212/http://blog.meebo.com/?p=24%20target=">put it into production</a>.
		To this day, most of the traffic on my site is related to this RSA business (which is crazy &ndash; haven't you seen
		my <a href="/guitar">collection of guitar transcriptions</a>??). I have received quite a few queries
		over the years asking how to make the library compatible with OpenSSL. The obstacle was always padding.
	</p>
	
	<p>
		About a year ago, a gentleman named <b>Eric Wilde</b> solved all of our problems. He implemented
		<a href="https://tools.ietf.org/html/rfc2313">PKCS #1 v1.5</a> padding and baked it right in,
		so you just have to add a flag to one function call, and you get the results correctly formatted for
		OpenSSL. In the process, he documented the RSA library more thoroughly, and also provided a
		stripped version (using <a href="http://www.crockford.com/javascript/jsmin.html">jsmin</a>) for production use.
	</p>
	
	<h3>How to use</h3>
	<p>
		The most common use for this library, as shown in the sidebar, is to have the server provide a public key
		to the client, which uses the JavaScript to encrypt data and send it back to the server. Only the server has
		knowledge of the private key, which it uses to decrypt the data.
	</p>
	
	<p>
		On the client, here are the JavaScript files you need:
		<ul class="sidebarlist">
			<li><a href="BigInt.js">Multiple-precision library</a></li>
			<li><a href="Barrett.js">Barrett modular reduction library</a></li>
			<li><a href="RSA.js">RSA library with documentation comments</a>
				<br />or <a href="RSA_Stripped.js">stripped for production use</a>.</li>
		</ul>
	</p>

	<p>
		On the server, you can use whatever language you'd like. In this example, we're using PHP.
		<ul class="sidebarlist">
			<li><a href="decrypt.php.txt">PHP source</a></li>
		</ul>
		Other languages, including Perl, Python, and Ruby, are coming soon.
	</p>
	
	<h3>Creating and managing keys</h3>
	
	<p>
		I recommend using <a href="https://www.openssl.org">OpenSSL</a> to create and manage RSA keys. The OpenSSL toolkit is
		readily available on Unix and Windows OSes, and if you're working with a third party's public key, you'll mostly likely
		get it in the <a href="https://tools.ietf.org/html/rfc1421">PEM container format</a>, which OpenSSL works nicely with.
	</p>
	
	<p>
		<b>Creating a new keypair:</b> To create a new 2048-bit keypair from a command-line interpreter such as bash, use this command:
	</p>
	<div style="margin-left:20px">
		<code>openssl genrsa -out private_key.pem 2048</code>
	</div>
	<p>
		The generated file, private_key.pem, should be <em>only accessible by the server, not the client or the general public</em>.
		The OpenSSL functions are available in all mainstream languages. This means the server should be able to read this file
		as-is and use it to decrypt data sent from the client. The JavaScript library, however, is <i>not</i> able to read this
		format. It expects the public key to be given as two numbers, the public exponent and the modulus, in hexadecimal
		format. Fortunately, OpenSSL makes this easy. To get the encryption exponent, use this command:
	</p>
	<div style="margin-left:20px">
		<code>openssl rsa -inform PEM -text -noout < private_key.pem</code>
	</div>
	<p>
		This prints out all key components as hexadecimal numbers. The component called "publicExponent" is what you're looking
		for, and by default it has the value 0x10001:
	</p>
	<div style="margin-left:20px">
		<code>publicExponent: 65537 (0x10001)</code>
	</div>
	<p>
		The hex value, e.g. "10001", is provided to the JavaScript library without the leading "0x". The other numbers, such as the
		modulus, are formatted in a way that delimits each byte with a colon. However, there is a different flag that prints the
		modulus only, without the colons:
	</p>
	<div style="margin-left:20px">
		<code>openssl rsa -inform PEM -modulus -noout < private_key.pem</code>
	</div>
	<p>
		After removing the "Modulus=" prefix, the rest of the value can be directly used by the JavaScript library, as you can
		see in the source for this webpage.
	</p>
	
	<p>
		<b>Using a third-party public key:</b> If someone else gives you their public key file in PEM format, you can extract the
		public exponent and the modulus using the same commands, but with the additional <code>-pubin</code> flag.
		To print the public exponent, use:
	</p>
	<div style="margin-left:20px">
		<code>openssl rsa -pubin -inform PEM -text -noout < public_key.pem</code>
	</div>	
	<p>
		And to print the modulus, use:
	</p>
	<div style="margin-left:20px">
		<code>openssl rsa -pubin -inform PEM -modulus -noout < public_key.pem</code>
	</div>
	
	<p>
		Again, see this webpage's source to see how these values are provided to the JavaScript library.
	</p>
	
	<h3>Acknowledgments</h3>
	<p>
		Many thanks to <b>Eric Wilde</b> and <b>Rob Saunders</b> for helping with padding and endianness issues.
	</p>
	
	<h3>Fun links:</h3>
	<ul class="sidebarlist">
		<li><a href="http://cacr.uwaterloo.ca/hac/about/chap8.pdf">Chapter 8: Public-Key Encryption</a>
			from the <a href="http://www.cacr.math.uwaterloo.ca/hac"><i>Handbook of Applied Cryptography</i></a></li>

		<li><a href="http://en.wikipedia.org/wiki/Man-in-the-middle_attack">Man-in-the-middle attack</a>. This stuff is
			susceptible. Understand the limits of this technique.</li>
			
		<li><a href="http://cryptosense.com/why-pkcs1v1-5-encryption-should-be-put-out-of-our-misery/"
		>Why PKCS#1v1.5 Encryption Should Be Put Out of Our Misery</a></li>
		
		<li><a href="https://web.archive.org/web/20091216114817/http://chargen.matasano.com/chargen/2006/4/28/oh-meebo.html"
			>Oh, Meebo.</a> Thomas Ptacek's (Matasano Security) criticism of Meebo using JavaScript-based RSA.</li>
	</ul>
</td>
<!-- End left column. -->

<!-- Sidebar. -->
<td width="35%" class="sidebar">
			
<div class="sidebarheading">Try it out</div>

<!-- Sidebar items. -->
<div class="sidebaritems">
	<form name="frmInput">
		<div style="padding-top:10px">
			<div>Plaintext</div>
			<textarea rows=16 style="width:100%;" class="sidebartextarea" name="txtPlaintext"
			>Type your plaintext here. Press "Encrypt" to encrypt it and send it to the server for decryption.</textarea>
			<div align="right">
				<input type="button" value="Encrypt" name="cmdEncrypt" onclick="cmdEncryptClick()">
			</div>
		</div>
	</form>
	<!-- Ciphertext is sent via a different form, so user-entered plaintext isn't included. -->
	<form name="frmSender" action="decrypt.php" method="post">
		<input type="hidden" name="ciphertext">
	</form>
</div>
<!-- End sidebar items. -->

</td>
<!-- End sidebar. -->

</tr>
</table>

<div style="width:100%;padding-top:20px">
			<div class="lawyers">
				copyright 1998-2016 dave shapiro
				<br />
				<a href="mailto:dave@ohdave.com">dave@ohdave.com</a>
			</div>
		</div>
	
</body>

</html>
