<a href="#">
  <strong id="following" class="stat">
    {{ count($user->followings) }}
  </strong>
  Followings
</a>
<a href="#">
  <strong id="followers" class="stat">
    {{ count($user->followers) }}
  </strong>
  Followers
</a>
<a href="#">
  <strong id="statuses" class="stat">
    {{ $user->statuses()->count() }}
  </strong>
  Blogs
</a>