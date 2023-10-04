<style>
    .profile-sidebar {

        display: flex;
        flex-direction: column;
        margin-top: 0px;
    }

    .acoount-card {
        background: #fff;
        border-radius: 12px;
        padding: 17px 0 0;
        margin: 16px 16px 0;
        border: 1px solid #d9d9d9;
    }

    .acoount-card p {
        font-family: inherit;
        font-style: normal;
        font-weight: 600;
        font-size: 24px;
        padding: 0 0 0 16px
    }

    .account-body {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        flex-direction: column;
    }

    .account-list-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        column-gap: 13px;
        cursor: pointer;
        padding: 0 0 0 16px;
    }

    .list-item-name {

        height: 72px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        border-bottom: 0.5px solid rgb(217, 217, 217);

        padding-right: 15px
    }
</style>

<aside class="col-md-4">
    <div class="profile-sidebar">

        <div class="acoount-card">
            <p>My Profile</p>
            <div class="account-body">
                <div class="account-list-item">
                    <div><svg width="34" height="34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="17" cy="17" r="17" fill="#F5F5F5"></circle>
                            <path clip-rule="evenodd"
                                d="M21.514 26.5h-8.348c-3.066 0-5.419-1.108-4.75-5.565l.777-6.041c.412-2.225 1.831-3.076 3.076-3.076h10.179c1.263 0 2.599.915 3.075 3.076l.778 6.04c.568 3.955-1.72 5.566-4.787 5.566Z"
                                stroke="#2F3032" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M21.651 11.598a4.32 4.32 0 0 0-4.32-4.32v0a4.32 4.32 0 0 0-4.339 4.32v0M20.297 16.102h-.046M14.466 16.102h-.046"
                                stroke="#2F3032" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                    </div>
                    <div class="list-item-name">
                        <a href="{{route('profile')}}"><h4>Booking</h4></a>
                    </div>
                </div>
            </div>

            <div class="account-body">
                <div class="account-list-item">
                    <div>
                        <svg width="34" height="34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="17" cy="17" r="17" fill="#F5F5F5"></circle>
                            <path clip-rule="evenodd"
                                d="M19.736 7.762h-6.652A3.82 3.82 0 0 0 9.25 11.49v10.737a3.807 3.807 0 0 0 3.724 3.887h8.098a3.867 3.867 0 0 0 3.73-3.887v-9.19l-5.066-5.276Z"
                                stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M19.475 7.75v2.909a2.575 2.575 0 0 0 2.569 2.575h2.754M16.64 14.909v6.04M18.986 17.264l-2.345-2.355-2.345 2.355"
                                stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                    </div>
                    <div class="list-item-name">
                        <a href="{{route('upload-prescription')}}"><h4>Prescrption</h4></a>
                    </div>
                </div>

            </div>
            <div class="account-body">
                <div class="account-list-item">
                    <div><svg width="34" height="34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="17" cy="17" r="17" fill="#F5F5F5"></circle>
                            <path clip-rule="evenodd" d="M19.5 15.5a2.5 2.5 0 1 0-5 0 2.5 2.5 0 0 0 5 0Z"
                                stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path clip-rule="evenodd"
                                d="M17 26c-1.199 0-7.5-5.102-7.5-10.437C9.5 11.387 12.857 8 17 8c4.142 0 7.5 3.387 7.5 7.563C24.5 20.898 18.198 26 17 26Z"
                                stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                    </div>
                    <div class="list-item-name">
                        <a href="{{route('address')}}"><h4>Address</h4></a>
                    </div>
                </div>
            </div>

            <div class="account-body">
                <div class="account-list-item">
                    <div><svg width="34" height="34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="17" cy="17" r="17" fill="#F5F5F5"></circle>
                            <path
                                d="M17 11.497c1.804-1.086 3.071-2.255 3.048-3.506A1.993 1.993 0 0 0 17 6.304a1.99 1.99 0 0 0-3.049 1.687c-.008 1.173 1.06 2.313 3.049 3.506Zm-1.058-4.325c.478-.014.786.489 1.058.783.245-.275.627-.827 1.057-.783a.82.82 0 0 1 .819.82c0 .406-.335 1.095-1.877 2.117-1.54-1.022-1.876-1.711-1.876-2.118a.82.82 0 0 1 .82-.82Z"
                                fill="#000"></path>
                            <path
                                d="M23.842 17.63a3.524 3.524 0 0 0 1.393-2.807 3.532 3.532 0 0 0-3.528-3.528 3.532 3.532 0 0 0-3.528 3.528c0 1.143.547 2.161 1.393 2.806a5.294 5.294 0 0 0-.6.313 2.928 2.928 0 0 0-3.097-.539 5.312 5.312 0 0 0-1.447-.95 3.524 3.524 0 0 0 1.393-2.806 3.532 3.532 0 0 0-3.528-3.528 3.532 3.532 0 0 0-3.528 3.527c0 1.144.547 2.162 1.393 2.807A5.3 5.3 0 0 0 7 21.295V26h20v-3.528a5.3 5.3 0 0 0-3.158-4.843Zm-4.49-2.807c0-1.299 1.056-2.356 2.355-2.356 1.3 0 2.356 1.057 2.356 2.356a2.359 2.359 0 0 1-2.356 2.356 2.359 2.359 0 0 1-2.356-2.356Zm-.584 5.296A1.77 1.77 0 0 1 17 21.886a1.77 1.77 0 0 1-1.768-1.767A1.77 1.77 0 0 1 17 18.35a1.77 1.77 0 0 1 1.768 1.768Zm-8.831-6.473c0-1.299 1.057-2.356 2.356-2.356 1.3 0 2.356 1.057 2.356 2.356 0 1.3-1.057 2.356-2.356 2.356a2.359 2.359 0 0 1-2.356-2.356Zm3.584 11.182h-5.35v-3.533a4.126 4.126 0 0 1 4.122-4.12c.978 0 1.877.342 2.585.913a2.935 2.935 0 0 0 .28 4.319 3.536 3.536 0 0 0-1.637 2.421Zm1.197 0A2.36 2.36 0 0 1 17 23.058a2.36 2.36 0 0 1 2.282 1.77h-4.564Zm11.11 0h-5.35a3.536 3.536 0 0 0-1.636-2.421 2.935 2.935 0 0 0 .828-3.516 4.095 4.095 0 0 1 2.037-.54 4.126 4.126 0 0 1 4.121 4.121v2.356Z"
                                fill="#000"></path>
                        </svg>
                    </div>
                    <div class="list-item-name">
                        <a href="{{route('patient')}}"><h4>Family Members</h4></a>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <div class="profile-sidebar">

        <div class="acoount-card">
            <p>My Benifits</p>
            <div class="account-body">
                <div class="account-list-item">
                    <div><svg width="34" height="34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="17" cy="17" r="17" fill="#F5F5F5"></circle>
                            <path clip-rule="evenodd"
                                d="M21.514 26.5h-8.348c-3.066 0-5.419-1.108-4.75-5.565l.777-6.041c.412-2.225 1.831-3.076 3.076-3.076h10.179c1.263 0 2.599.915 3.075 3.076l.778 6.04c.568 3.955-1.72 5.566-4.787 5.566Z"
                                stroke="#2F3032" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M21.651 11.598a4.32 4.32 0 0 0-4.32-4.32v0a4.32 4.32 0 0 0-4.339 4.32v0M20.297 16.102h-.046M14.466 16.102h-.046"
                                stroke="#2F3032" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                    </div>
                    <div class="list-item-name">
                   
                        <a href="{{route('coupon')}}"><h4>My Referal</h4></a>
             
                    </div>
                </div>

            </div>
        </div>
    </div>
</aside>
