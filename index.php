<?php
	// require_once './VK.php';
	// VK::getAccessToken('');
?>
<?php header('Access-Control-Allow-Origin: *'); ?>
Bot works!
<div class="cli">
	
</div>
<script type="text/javascript">
	var token = 'd02d6b28462bd6dc35a572df34e5620fc07ee972137b068f29b81762eeb7742fc240278f5de99407b3b91';
	var version = '5.5';
	var api_url = 'https://api.vk.com/method/';
	var cors = 'https://crossorigin.me/';

	/* @Params
	 * Doesn't matter
	 */
	var GET_MESSAGES = 'messages.get';

	/* @Params
	 * userid
	 * message
	 */
	var SEND_MESSAGE = 'messages.send';

	function getUnreadMessages(){
		var xhr = new XMLHttpRequest();
		var ajax_url = cors + api_url + GET_MESSAGES + '?access_token=' + token + '&v=' + version;
		xhr.open('GET', ajax_url, true);
		xhr.onreadystatechange = function(){
			if(xhr.readyState != 4) return;
			console.log(xhr.responseText);
			if(xhr.status) document.querySelector('.cli').innerHTML += '<p>Не удалось получить сообщения</p>';
			proccessMessages(JSON.parse(xhr.responseText).response.items);
		}
		xhr.send();
	}

	function proccessMessages(messages){
		for(var i = 0; i < messages.length; i++){
			var message = messages[i];
			if(message.readState == 0 && message.out == 0){
				sendMessage(message.user_id, 'Иди нахуй!');
			}
		}
		return;
	}

	function sendMessage(recipient, messageText){
		var xhr = new XMLHttpRequest();
		var ajax_url = api_url + SEND_MESSAGE + '?access_token=' + token + '&v=' + version + '&user_id = ' + recipient + '&message=' + messageText;
		xhr.open('GET', ajax_url, true);
		xhr.onreadystatechange = function(){
			if(xhr.readyState != 4) return;
			if(xhr.status) document.querySelector('.cli').innerHTML += '<p>Не удалось отправить сообщение</p>';
			document.querySelector('.cli').innerHTML += '<p>Сообщение отправлено :)</p>';
		}
		xhr.send();
	}
</script>