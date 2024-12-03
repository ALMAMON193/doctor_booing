<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h1 class="modal-title fs-5" id="notificationModalLabel">
                    Notification
                </h1>
            </div>
            <div class="modal-body notify-body">
                @forelse(auth()->user()->unreadNotifications as $notification)
                    <div class="notify-item">
                        <div class="notify-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M12 8V9M12 11.5V16M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                    stroke="#1F305E" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="notify-details">
                            <h6 class="notify-title">{{ $notification->data['message'] }}</h6>
                            <p class="notify-data">{{ $notification->created_at->diffForHumans() }}</p>
                        </div>
                        <form action="{{ route('admin.notification.read.single', $notification->id) }}" method="POST"
                              style="display: inline;">
                            @csrf
                            <button type="submit" class="btn notify-close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none">
                                    <path d="M16 16L8 8M8 16L16 8" stroke="#6B7280" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @empty
                    <p>No notifications available.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
