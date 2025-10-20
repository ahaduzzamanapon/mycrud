<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSeoSettingRequest;
use App\Http\Requests\UpdateSeoSettingRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\SeoSetting;
use Illuminate\Http\Request;
use Flash;
use Response;

class SeoSettingController extends AppBaseController
{
    /**
     * Display a listing of the SeoSetting.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var SeoSetting $seoSettings */
        $seoSettings = SeoSetting::all();

        return view('seo_settings.index')
            ->with('seoSettings', $seoSettings);
    }

    /**
     * Show the form for creating a new SeoSetting.
     *
     * @return Response
     */
    public function create()
    {
        return view('seo_settings.create');
    }

    /**
     * Store a newly created SeoSetting in storage.
     *
     * @param CreateSeoSettingRequest $request
     *
     * @return Response
     */
    public function store(CreateSeoSettingRequest $request)
    {
        $input = $request->all();

        /** @var SeoSetting $seoSetting */
        $seoSetting = SeoSetting::create($input);

        Flash::success('Seo Setting saved successfully.');

        return redirect(route('seoSettings.index'));
    }

    /**
     * Display the specified SeoSetting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SeoSetting $seoSetting */
        $seoSetting = SeoSetting::find($id);

        if (empty($seoSetting)) {
            Flash::error('Seo Setting not found');

            return redirect(route('seoSettings.index'));
        }

        return view('seo_settings.show')->with('seoSetting', $seoSetting);
    }

    /**
     * Show the form for editing the specified SeoSetting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var SeoSetting $seoSetting */
        $seoSetting = SeoSetting::find($id);

        if (empty($seoSetting)) {
            Flash::error('Seo Setting not found');

            return redirect(route('seoSettings.index'));
        }

        return view('seo_settings.edit')->with('seoSetting', $seoSetting);
    }

    /**
     * Update the specified SeoSetting in storage.
     *
     * @param int $id
     * @param UpdateSeoSettingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeoSettingRequest $request)
    {
        /** @var SeoSetting $seoSetting */
        $seoSetting = SeoSetting::find($id);

        if (empty($seoSetting)) {
            Flash::error('Seo Setting not found');

            return redirect(route('seoSettings.index'));
        }

        $seoSetting->fill($request->all());
        $seoSetting->save();

        Flash::success('Seo Setting updated successfully.');

        return redirect(route('seoSettings.index'));
    }

    /**
     * Remove the specified SeoSetting from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SeoSetting $seoSetting */
        $seoSetting = SeoSetting::find($id);

        if (empty($seoSetting)) {
            Flash::error('Seo Setting not found');

            return redirect(route('seoSettings.index'));
        }

        $seoSetting->delete();

        Flash::success('Seo Setting deleted successfully.');

        return redirect(route('seoSettings.index'));
    }
}
