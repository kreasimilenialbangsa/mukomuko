<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\NotificationDataTable;
use App\Helpers\FCM;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateNotificationRequest;
use App\Http\Requests\Admin\UpdateNotificationRequest;
use App\Repositories\Admin\NotificationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Session;
use Response;

class NotificationController extends AppBaseController
{
    /** @var NotificationRepository $notificationRepository*/
    private $notificationRepository;

    public function __construct(NotificationRepository $notificationRepo)
    {
        $this->notificationRepository = $notificationRepo;
    }

    /**
     * Display a listing of the Notification.
     *
     * @param NotificationDataTable $notificationDataTable
     *
     * @return Response
     */
    public function index(NotificationDataTable $notificationDataTable)
    {
        return $notificationDataTable->render('admin.pages.notifications.index');
    }

    /**
     * Show the form for creating a new Notification.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.notifications.create');
    }

    /**
     * Store a newly created Notification in storage.
     *
     * @param CreateNotificationRequest $request
     *
     * @return Response
     */
    public function store(CreateNotificationRequest $request)
    {
        $input = [
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->filepath,
            'order_id' => 'ZISWAF-1666173337'
        ];

        $fcm = FCM::broadcast($input);

        $notification = $this->notificationRepository->create($input);

        Session::flash('success', 'Data berhasil disimpan');

        return redirect(route('admin.notifications.index'));
    }

    /**
     * Display the specified Notification.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $notification = $this->notificationRepository->find($id);

        if (empty($notification)) {
            Session::flash('error', 'Data tidak ditemukan');

            return redirect(route('admin.notifications.index'));
        }

        return view('admin.pages.notifications.show')->with('notification', $notification);
    }

    /**
     * Show the form for editing the specified Notification.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $notification = $this->notificationRepository->find($id);

        if (empty($notification)) {
            Session::flash('error', 'Data tidak ditemukan');

            return redirect(route('admin.notifications.index'));
        }

        return view('admin.pages.notifications.edit')->with('notification', $notification);
    }

    /**
     * Update the specified Notification in storage.
     *
     * @param int $id
     * @param UpdateNotificationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNotificationRequest $request)
    {
        $notification = $this->notificationRepository->find($id);

        if (empty($notification)) {
            Session::flash('error', 'Data tidak ditemukan');

            return redirect(route('admin.notifications.index'));
        }

        $input = [
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->filepath
        ];

        $notification = $this->notificationRepository->update($input, $id);

        Session::flash('success', 'Data berhasil diubah');

        return redirect(route('admin.notifications.index'));
    }

    /**
     * Remove the specified Notification from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $notification = $this->notificationRepository->find($id);

        if (empty($notification)) {
            Session::flash('error', 'Data tidak ditemukan');

            return redirect(route('admin.notifications.index'));
        }

        $this->notificationRepository->delete($id);

        Session::flash('success', 'Data berhasil dihapus');

        return redirect(route('admin.notifications.index'));
    }
}
