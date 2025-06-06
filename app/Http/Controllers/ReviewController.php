<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReviewService;
use App\Http\Resources\ReviewResource;
use App\Http\Requests\ReviewstoreRequest;
use App\Http\Requests\ReviewUpdateRequest;


class ReviewController extends Controller
{
     private ReviewService $reviewService;
    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function get(){
        $review = $this->reviewService->get();
        return ReviewResource::collection($review);
        
    }

     public function details($id){
        $review = $this->reviewService->details($id);
        return new ReviewResource($review);
        
    }
    public function store(ReviewstoreRequest $request){
        $data = $request->validated();
        $review = $this->reviewService->store($data);
        return new ReviewResource($review);
    }
    public function update(int $id, ReviewUpdateRequest $request){
        $data = $request->validated();
        $review = $this->reviewService->update($id, $data);
        return new ReviewResource($review);
    }

    public function delete(int $id){
        $review = $this->reviewService->delete($id);
        return new ReviewResource($review);
}
}