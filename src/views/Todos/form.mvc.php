<label for="name">Name</label>
<input type="text" id="name" name="title" value="{{ todo["title"] }}">

{% if (isset($errors["name"])): %}
<p>{{ errors["name"] }}</p>
{% endif; %}

<label for="description">Description</label>
<textarea id="description" name="description">{{ todo["description"] }}</textarea>

<lable for="completed">Completed</lable>
<input value="0" name="completed" id="completed">

<lable for="user_id">UserId</lable>
<input value="860c602c-2b99-48b3-82b7-253f52ad9c7e" name="user_id" id="user_id">

<button>Save</button>
