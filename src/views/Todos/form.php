<lable for="title">Title</lable>
<input type="text" name="title" id="title" value="{{ todo["title"] ?? "" }}">

{% if (isset($errors['title'])): %}
    <p>{{ errors['title'] }}</p>
{% endif; %}

<label for="description">Description</label>
<textarea name="description" id="description">{{ todo["description"] ?? "" }}</textarea>

<lable for="completed">Completed</lable>
<input value="0" name="completed" id="completed">

<lable for="user_id">UserId</lable>
<input value="860c602c-2b99-48b3-82b7-253f52ad9c7e" name="user_id" id="user_id">

<button>Save</button>
