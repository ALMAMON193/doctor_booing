@extends('backend.client.app')

@push('styles')
    <style>
        #calendar {
            max-width: 100%;
            margin: 20px auto;
            background-color: #ffffff;
            /* Optional background for the calendar */
            border-radius: 5px;
            padding: 10px;
        }
    </style>
@endpush

@section('content')
    <div class="main-content">
        <div class="main-content-container">
            <!-- main container header start -->
            @include('backend.client.partials.header')
            <!-- main container header end -->
            <div class="section-title mt-4">Schedule</div>
            <div class="mt-4 mt-md-5 fc fc-media-screen fc-direction-ltr fc-theme-standard" id="calendar">
                <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">
                    <div class="fc-toolbar-chunk">
                        <div class="fc-button-group"><button type="button" title="Previous month" aria-pressed="false"
                                class="fc-prev-button fc-button fc-button-primary"><span
                                    class="fc-icon fc-icon-chevron-left"></span></button><button type="button"
                                title="Next month" aria-pressed="false"
                                class="fc-next-button fc-button fc-button-primary"><span
                                    class="fc-icon fc-icon-chevron-right"></span></button></div><button type="button"
                            title="This month" disabled="" aria-pressed="false"
                            class="fc-today-button fc-button fc-button-primary">today</button>
                    </div>
                    <div class="fc-toolbar-chunk">
                        <h2 class="fc-toolbar-title" id="fc-dom-1">November 2024</h2>
                    </div>
                    <div class="fc-toolbar-chunk">
                        <div class="fc-button-group"><button type="button" title="month view" aria-pressed="true"
                                class="fc-dayGridMonth-button fc-button fc-button-primary fc-button-active">month</button><button
                                type="button" title="week view" aria-pressed="false"
                                class="fc-timeGridWeek-button fc-button fc-button-primary">week</button><button
                                type="button" title="day view" aria-pressed="false"
                                class="fc-timeGridDay-button fc-button fc-button-primary">day</button></div>
                    </div>
                </div>
                <div aria-labelledby="fc-dom-1" class="fc-view-harness fc-view-harness-active" style="height: 1068.89px;">
                    <div class="fc-dayGridMonth-view fc-view fc-daygrid">
                        <table role="grid" class="fc-scrollgrid  fc-scrollgrid-liquid">
                            <thead role="rowgroup">
                                <tr role="presentation" class="fc-scrollgrid-section fc-scrollgrid-section-header ">
                                    <th role="presentation">
                                        <div class="fc-scroller-harness">
                                            <div class="fc-scroller" style="overflow: hidden;">
                                                <table role="presentation" class="fc-col-header " style="width: 1441px;">
                                                    <colgroup></colgroup>
                                                    <thead role="presentation">
                                                        <tr role="row">
                                                            <th role="columnheader"
                                                                class="fc-col-header-cell fc-day fc-day-sun">
                                                                <div class="fc-scrollgrid-sync-inner"><a
                                                                        aria-label="Sunday"
                                                                        class="fc-col-header-cell-cushion">Sun</a></div>
                                                            </th>
                                                            <th role="columnheader"
                                                                class="fc-col-header-cell fc-day fc-day-mon">
                                                                <div class="fc-scrollgrid-sync-inner"><a
                                                                        aria-label="Monday"
                                                                        class="fc-col-header-cell-cushion">Mon</a></div>
                                                            </th>
                                                            <th role="columnheader"
                                                                class="fc-col-header-cell fc-day fc-day-tue">
                                                                <div class="fc-scrollgrid-sync-inner"><a
                                                                        aria-label="Tuesday"
                                                                        class="fc-col-header-cell-cushion">Tue</a></div>
                                                            </th>
                                                            <th role="columnheader"
                                                                class="fc-col-header-cell fc-day fc-day-wed">
                                                                <div class="fc-scrollgrid-sync-inner"><a
                                                                        aria-label="Wednesday"
                                                                        class="fc-col-header-cell-cushion">Wed</a></div>
                                                            </th>
                                                            <th role="columnheader"
                                                                class="fc-col-header-cell fc-day fc-day-thu">
                                                                <div class="fc-scrollgrid-sync-inner"><a
                                                                        aria-label="Thursday"
                                                                        class="fc-col-header-cell-cushion">Thu</a></div>
                                                            </th>
                                                            <th role="columnheader"
                                                                class="fc-col-header-cell fc-day fc-day-fri">
                                                                <div class="fc-scrollgrid-sync-inner"><a
                                                                        aria-label="Friday"
                                                                        class="fc-col-header-cell-cushion">Fri</a></div>
                                                            </th>
                                                            <th role="columnheader"
                                                                class="fc-col-header-cell fc-day fc-day-sat">
                                                                <div class="fc-scrollgrid-sync-inner"><a
                                                                        aria-label="Saturday"
                                                                        class="fc-col-header-cell-cushion">Sat</a></div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody role="rowgroup">
                                <tr role="presentation"
                                    class="fc-scrollgrid-section fc-scrollgrid-section-body  fc-scrollgrid-section-liquid">
                                    <td role="presentation">
                                        <div class="fc-scroller-harness fc-scroller-harness-liquid">
                                            <div class="fc-scroller fc-scroller-liquid-absolute"
                                                style="overflow: hidden auto;">
                                                <div class="fc-daygrid-body fc-daygrid-body-unbalanced "
                                                    style="width: 1441px;">
                                                    <table role="presentation" class="fc-scrollgrid-sync-table"
                                                        style="width: 1441px; height: 1037px;">
                                                        <colgroup></colgroup>
                                                        <tbody role="presentation">
                                                            <tr role="row">
                                                                <td aria-labelledby="fc-dom-2" role="gridcell"
                                                                    data-date="2024-10-27"
                                                                    class="fc-day fc-day-sun fc-day-past fc-day-other fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="October 27, 2024"
                                                                                id="fc-dom-2"
                                                                                class="fc-daygrid-day-number">27</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-4" role="gridcell"
                                                                    data-date="2024-10-28"
                                                                    class="fc-day fc-day-mon fc-day-past fc-day-other fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="October 28, 2024"
                                                                                id="fc-dom-4"
                                                                                class="fc-daygrid-day-number">28</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-6" role="gridcell"
                                                                    data-date="2024-10-29"
                                                                    class="fc-day fc-day-tue fc-day-past fc-day-other fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="October 29, 2024"
                                                                                id="fc-dom-6"
                                                                                class="fc-daygrid-day-number">29</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-8" role="gridcell"
                                                                    data-date="2024-10-30"
                                                                    class="fc-day fc-day-wed fc-day-past fc-day-other fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="October 30, 2024"
                                                                                id="fc-dom-8"
                                                                                class="fc-daygrid-day-number">30</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-10" role="gridcell"
                                                                    data-date="2024-10-31"
                                                                    class="fc-day fc-day-thu fc-day-past fc-day-other fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="October 31, 2024"
                                                                                id="fc-dom-10"
                                                                                class="fc-daygrid-day-number">31</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-12" role="gridcell"
                                                                    data-date="2024-11-01"
                                                                    class="fc-day fc-day-fri fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 1, 2024"
                                                                                id="fc-dom-12"
                                                                                class="fc-daygrid-day-number">1</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-14" role="gridcell"
                                                                    data-date="2024-11-02"
                                                                    class="fc-day fc-day-sat fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 2, 2024"
                                                                                id="fc-dom-14"
                                                                                class="fc-daygrid-day-number">2</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr role="row">
                                                                <td aria-labelledby="fc-dom-16" role="gridcell"
                                                                    data-date="2024-11-03"
                                                                    class="fc-day fc-day-sun fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 3, 2024"
                                                                                id="fc-dom-16"
                                                                                class="fc-daygrid-day-number">3</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-18" role="gridcell"
                                                                    data-date="2024-11-04"
                                                                    class="fc-day fc-day-mon fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 4, 2024"
                                                                                id="fc-dom-18"
                                                                                class="fc-daygrid-day-number">4</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-20" role="gridcell"
                                                                    data-date="2024-11-05"
                                                                    class="fc-day fc-day-tue fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 5, 2024"
                                                                                id="fc-dom-20"
                                                                                class="fc-daygrid-day-number">5</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-22" role="gridcell"
                                                                    data-date="2024-11-06"
                                                                    class="fc-day fc-day-wed fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 6, 2024"
                                                                                id="fc-dom-22"
                                                                                class="fc-daygrid-day-number">6</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-24" role="gridcell"
                                                                    data-date="2024-11-07"
                                                                    class="fc-day fc-day-thu fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 7, 2024"
                                                                                id="fc-dom-24"
                                                                                class="fc-daygrid-day-number">7</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-26" role="gridcell"
                                                                    data-date="2024-11-08"
                                                                    class="fc-day fc-day-fri fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 8, 2024"
                                                                                id="fc-dom-26"
                                                                                class="fc-daygrid-day-number">8</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-28" role="gridcell"
                                                                    data-date="2024-11-09"
                                                                    class="fc-day fc-day-sat fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 9, 2024"
                                                                                id="fc-dom-28"
                                                                                class="fc-daygrid-day-number">9</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr role="row">
                                                                <td aria-labelledby="fc-dom-30" role="gridcell"
                                                                    data-date="2024-11-10"
                                                                    class="fc-day fc-day-sun fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 10, 2024"
                                                                                id="fc-dom-30"
                                                                                class="fc-daygrid-day-number">10</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-event-harness"
                                                                                style="margin-top: 0px;"><a
                                                                                    class="fc-event fc-event-start fc-event-end fc-event-past fc-daygrid-event fc-daygrid-dot-event">
                                                                                    <div class="fc-daygrid-event-dot">
                                                                                    </div>
                                                                                    <div class="fc-event-time">9:00am</div>
                                                                                    <div class="fc-event-title">John Doe
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-event-harness"
                                                                                style="margin-top: 0px;"><a
                                                                                    class="fc-event fc-event-start fc-event-end fc-event-past fc-daygrid-event fc-daygrid-dot-event">
                                                                                    <div class="fc-daygrid-event-dot">
                                                                                    </div>
                                                                                    <div class="fc-event-time">9:00am</div>
                                                                                    <div class="fc-event-title">John Doe
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-event-harness"
                                                                                style="margin-top: 0px;"><a
                                                                                    class="fc-event fc-event-start fc-event-end fc-event-past fc-daygrid-event fc-daygrid-dot-event">
                                                                                    <div class="fc-daygrid-event-dot">
                                                                                    </div>
                                                                                    <div class="fc-event-time">9:00am</div>
                                                                                    <div class="fc-event-title">John Doe
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-event-harness"
                                                                                style="margin-top: 0px;"><a
                                                                                    class="fc-event fc-event-start fc-event-end fc-event-past fc-daygrid-event fc-daygrid-dot-event">
                                                                                    <div class="fc-daygrid-event-dot">
                                                                                    </div>
                                                                                    <div class="fc-event-time">9:00am</div>
                                                                                    <div class="fc-event-title">John Doe
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-event-harness"
                                                                                style="margin-top: 0px;"><a
                                                                                    class="fc-event fc-event-start fc-event-end fc-event-past fc-daygrid-event fc-daygrid-dot-event">
                                                                                    <div class="fc-daygrid-event-dot">
                                                                                    </div>
                                                                                    <div class="fc-event-time">9:00am</div>
                                                                                    <div class="fc-event-title">John Doe
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-event-harness"
                                                                                style="margin-top: 0px;"><a
                                                                                    class="fc-event fc-event-start fc-event-end fc-event-past fc-daygrid-event fc-daygrid-dot-event">
                                                                                    <div class="fc-daygrid-event-dot">
                                                                                    </div>
                                                                                    <div class="fc-event-time">10:00am
                                                                                    </div>
                                                                                    <div class="fc-event-title">John Doe
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-event-harness"
                                                                                style="margin-top: 0px;"><a
                                                                                    class="fc-event fc-event-start fc-event-end fc-event-past fc-daygrid-event fc-daygrid-dot-event">
                                                                                    <div class="fc-daygrid-event-dot">
                                                                                    </div>
                                                                                    <div class="fc-event-time">11:00am
                                                                                    </div>
                                                                                    <div class="fc-event-title">John Doe
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-32" role="gridcell"
                                                                    data-date="2024-11-11"
                                                                    class="fc-day fc-day-mon fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 11, 2024"
                                                                                id="fc-dom-32"
                                                                                class="fc-daygrid-day-number">11</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-34" role="gridcell"
                                                                    data-date="2024-11-12"
                                                                    class="fc-day fc-day-tue fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 12, 2024"
                                                                                id="fc-dom-34"
                                                                                class="fc-daygrid-day-number">12</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-event-harness"
                                                                                style="margin-top: 0px;"><a
                                                                                    class="fc-event fc-event-start fc-event-end fc-event-past fc-daygrid-event fc-daygrid-dot-event">
                                                                                    <div class="fc-daygrid-event-dot">
                                                                                    </div>
                                                                                    <div class="fc-event-time">11:30am
                                                                                    </div>
                                                                                    <div class="fc-event-title">John Doe
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-36" role="gridcell"
                                                                    data-date="2024-11-13"
                                                                    class="fc-day fc-day-wed fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 13, 2024"
                                                                                id="fc-dom-36"
                                                                                class="fc-daygrid-day-number">13</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-38" role="gridcell"
                                                                    data-date="2024-11-14"
                                                                    class="fc-day fc-day-thu fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 14, 2024"
                                                                                id="fc-dom-38"
                                                                                class="fc-daygrid-day-number">14</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-40" role="gridcell"
                                                                    data-date="2024-11-15"
                                                                    class="fc-day fc-day-fri fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 15, 2024"
                                                                                id="fc-dom-40"
                                                                                class="fc-daygrid-day-number">15</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-event-harness"
                                                                                style="margin-top: 0px;"><a
                                                                                    class="fc-event fc-event-start fc-event-end fc-event-past fc-daygrid-event fc-daygrid-dot-event">
                                                                                    <div class="fc-daygrid-event-dot">
                                                                                    </div>
                                                                                    <div class="fc-event-time">2:00pm</div>
                                                                                    <div class="fc-event-title">John Doe
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-42" role="gridcell"
                                                                    data-date="2024-11-16"
                                                                    class="fc-day fc-day-sat fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 16, 2024"
                                                                                id="fc-dom-42"
                                                                                class="fc-daygrid-day-number">16</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr role="row">
                                                                <td aria-labelledby="fc-dom-44" role="gridcell"
                                                                    data-date="2024-11-17"
                                                                    class="fc-day fc-day-sun fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 17, 2024"
                                                                                id="fc-dom-44"
                                                                                class="fc-daygrid-day-number">17</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-46" role="gridcell"
                                                                    data-date="2024-11-18"
                                                                    class="fc-day fc-day-mon fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 18, 2024"
                                                                                id="fc-dom-46"
                                                                                class="fc-daygrid-day-number">18</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-48" role="gridcell"
                                                                    data-date="2024-11-19"
                                                                    class="fc-day fc-day-tue fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 19, 2024"
                                                                                id="fc-dom-48"
                                                                                class="fc-daygrid-day-number">19</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-50" role="gridcell"
                                                                    data-date="2024-11-20"
                                                                    class="fc-day fc-day-wed fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 20, 2024"
                                                                                id="fc-dom-50"
                                                                                class="fc-daygrid-day-number">20</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-event-harness"
                                                                                style="margin-top: 0px;"><a
                                                                                    class="fc-event fc-event-start fc-event-end fc-event-past fc-daygrid-event fc-daygrid-dot-event">
                                                                                    <div class="fc-daygrid-event-dot">
                                                                                    </div>
                                                                                    <div class="fc-event-time">10:30am
                                                                                    </div>
                                                                                    <div class="fc-event-title">John Doe
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-52" role="gridcell"
                                                                    data-date="2024-11-21"
                                                                    class="fc-day fc-day-thu fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 21, 2024"
                                                                                id="fc-dom-52"
                                                                                class="fc-daygrid-day-number">21</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-54" role="gridcell"
                                                                    data-date="2024-11-22"
                                                                    class="fc-day fc-day-fri fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 22, 2024"
                                                                                id="fc-dom-54"
                                                                                class="fc-daygrid-day-number">22</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-event-harness"
                                                                                style="margin-top: 0px;"><a
                                                                                    class="fc-event fc-event-start fc-event-end fc-event-past fc-daygrid-event fc-daygrid-dot-event">
                                                                                    <div class="fc-daygrid-event-dot">
                                                                                    </div>
                                                                                    <div class="fc-event-time">1:00pm</div>
                                                                                    <div class="fc-event-title">John Doe
                                                                                    </div>
                                                                                </a></div>
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-56" role="gridcell"
                                                                    data-date="2024-11-23"
                                                                    class="fc-day fc-day-sat fc-day-past fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 23, 2024"
                                                                                id="fc-dom-56"
                                                                                class="fc-daygrid-day-number">23</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr role="row">
                                                                <td aria-labelledby="fc-dom-58" role="gridcell"
                                                                    data-date="2024-11-24"
                                                                    class="fc-day fc-day-sun fc-day-today fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 24, 2024"
                                                                                id="fc-dom-58"
                                                                                class="fc-daygrid-day-number">24</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-60" role="gridcell"
                                                                    data-date="2024-11-25"
                                                                    class="fc-day fc-day-mon fc-day-future fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 25, 2024"
                                                                                id="fc-dom-60"
                                                                                class="fc-daygrid-day-number">25</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-62" role="gridcell"
                                                                    data-date="2024-11-26"
                                                                    class="fc-day fc-day-tue fc-day-future fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 26, 2024"
                                                                                id="fc-dom-62"
                                                                                class="fc-daygrid-day-number">26</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-64" role="gridcell"
                                                                    data-date="2024-11-27"
                                                                    class="fc-day fc-day-wed fc-day-future fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 27, 2024"
                                                                                id="fc-dom-64"
                                                                                class="fc-daygrid-day-number">27</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-66" role="gridcell"
                                                                    data-date="2024-11-28"
                                                                    class="fc-day fc-day-thu fc-day-future fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 28, 2024"
                                                                                id="fc-dom-66"
                                                                                class="fc-daygrid-day-number">28</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-68" role="gridcell"
                                                                    data-date="2024-11-29"
                                                                    class="fc-day fc-day-fri fc-day-future fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 29, 2024"
                                                                                id="fc-dom-68"
                                                                                class="fc-daygrid-day-number">29</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-70" role="gridcell"
                                                                    data-date="2024-11-30"
                                                                    class="fc-day fc-day-sat fc-day-future fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="November 30, 2024"
                                                                                id="fc-dom-70"
                                                                                class="fc-daygrid-day-number">30</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr role="row">
                                                                <td aria-labelledby="fc-dom-72" role="gridcell"
                                                                    data-date="2024-12-01"
                                                                    class="fc-day fc-day-sun fc-day-future fc-day-other fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="December 1, 2024"
                                                                                id="fc-dom-72"
                                                                                class="fc-daygrid-day-number">1</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-74" role="gridcell"
                                                                    data-date="2024-12-02"
                                                                    class="fc-day fc-day-mon fc-day-future fc-day-other fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="December 2, 2024"
                                                                                id="fc-dom-74"
                                                                                class="fc-daygrid-day-number">2</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-76" role="gridcell"
                                                                    data-date="2024-12-03"
                                                                    class="fc-day fc-day-tue fc-day-future fc-day-other fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="December 3, 2024"
                                                                                id="fc-dom-76"
                                                                                class="fc-daygrid-day-number">3</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-78" role="gridcell"
                                                                    data-date="2024-12-04"
                                                                    class="fc-day fc-day-wed fc-day-future fc-day-other fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="December 4, 2024"
                                                                                id="fc-dom-78"
                                                                                class="fc-daygrid-day-number">4</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-80" role="gridcell"
                                                                    data-date="2024-12-05"
                                                                    class="fc-day fc-day-thu fc-day-future fc-day-other fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="December 5, 2024"
                                                                                id="fc-dom-80"
                                                                                class="fc-daygrid-day-number">5</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-82" role="gridcell"
                                                                    data-date="2024-12-06"
                                                                    class="fc-day fc-day-fri fc-day-future fc-day-other fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="December 6, 2024"
                                                                                id="fc-dom-82"
                                                                                class="fc-daygrid-day-number">6</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                                <td aria-labelledby="fc-dom-84" role="gridcell"
                                                                    data-date="2024-12-07"
                                                                    class="fc-day fc-day-sat fc-day-future fc-day-other fc-daygrid-day">
                                                                    <div
                                                                        class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                                                        <div class="fc-daygrid-day-top"><a
                                                                                aria-label="December 7, 2024"
                                                                                id="fc-dom-84"
                                                                                class="fc-daygrid-day-number">7</a></div>
                                                                        <div class="fc-daygrid-day-events">
                                                                            <div class="fc-daygrid-day-bottom"
                                                                                style="margin-top: 0px;"></div>
                                                                        </div>
                                                                        <div class="fc-daygrid-day-bg"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
@endpush
