<div>
    <section class="py-5">
        <div class="row">
            <div class="col-md-4 col-lg-3">

                    <div class="bg-white p-3 rounded h-100 d-flex flex-column align-items-center">

                        @if ($fileDetail)
                            @if ($fileDetail->status == 0)
                                <div class="text-warning" style="font-size: 5rem;"><svg class="bi bi-person-exclamation" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"></path>
                                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1.5a.5.5 0 0 0 1 0V11a.5.5 0 0 0-.5-.5Zm0 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Z"></path>
                                </svg></div>
                                <h4>{{$fileDetail->first_name.' '.$fileDetail->last_name}}</h4>
                                <p>Publish on: {{ \Carbon\Carbon::parse($fileDetail->updated_at)->format('F d, Y')}}3</p>
                                <p>Status: Processing</p>
                                <a class="btn btn-outline-primary w-100 mb-3" role="button" href="#" data-bs-toggle="modal" data-bs-target="#documentsModal">View Documents</a>
                                <a class="btn btn-success w-100" role="button" href="#" data-bs-toggle="modal" data-bs-target="#completeProcess">Attach Quote</a>
                            @endif

                            @if ($fileDetail->status == 1)
                                <div class="text-success" style="font-size: 5rem;"><svg class="bi bi-person-check" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"></path>
                                    <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"></path>
                                </svg></div>
                                <h4>{{$fileDetail->first_name.' '.$fileDetail->last_name}}</h4>
                                <p>Publish on: {{ \Carbon\Carbon::parse($fileDetail->updated_at)->format('F d, Y')}}</p>
                                <p>Status: Completed</p>
                                <a class="btn btn-outline-primary w-100 mb-3" role="button" href="" data-bs-toggle="modal" data-bs-target="#documentsModal">View Documents</a>
                                <a class="w-100 btn btn-outline-success" role="button" href="{{Storage::url($fileDetail->quote)}}" target="_blank">
                                    Quote Completed
                                </a>
                            @endif

                        @else
                            {{-- <div class="h-100 d-flex align-items-center flex-column justify-content-center"><i class="bi bi-file-break" style="font-size: 5rem;"></i><p>Select an item to see the contents</p></div> --}}
                        @endif

                    </div>


            </div>
            <div class="col">
                <div class="bg-white p-3 rounded d-flex flex-column align-items-center mb-3">
                    <div class="input-group"><input class="form-control" type="text" placeholder="Search here..." /><button class="btn btn-primary" type="button">GO</button></div>
                </div>
                <div class="bg-white p-3 rounded h-100">
                    <div class="row">
                        @if ($contents)

                            @foreach ($contents as $content )
                                <div class="col-3 mb-3">

                                    @if ($content->status == 0)
                                    <a class="text-center p-3 rounded bg-light d-block text-decoration-none text-dark hvr-reveal" href="#" wire:click="details({{$content->id}})">
                                        <div class="text-warning" style="font-size: 5rem;"><svg class="bi bi-person-exclamation" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"></path>
                                                <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1.5a.5.5 0 0 0 1 0V11a.5.5 0 0 0-.5-.5Zm0 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Z"></path>
                                            </svg></div>
                                        <p>{{$content->first_name.' '.$content->last_name}}</p>
                                    </a>
                                    @else
                                    <a class="text-center p-3 rounded bg-light d-block text-decoration-none text-dark hvr-reveal" href="#" wire:click="details({{$content->id}})">
                                        <div class="text-success" style="font-size: 5rem;"><svg class="bi bi-person-check" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"></path>
                                                <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"></path>
                                            </svg></div>
                                        <p>{{$content->first_name.' '.$content->last_name}}</p>
                                    </a>
                                    @endif


                                </div>

                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if ($fileDetail)
        <div wire:ignore.self id="documentsModal" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{$fileDetail->first_name}} Documents</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">


                                @foreach (json_decode($fileDetail->file) as $key => $url )
                                <div class="col-3 mb-3">
                                    <a class="text-decoration-none d-block p-3 text-center hvr-reveal bg-light" href="{{asset($url)}}" target="_blank">
                                        <div style="font-size: 5rem;">
                                            <svg class="bi bi-file-richtext" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M7 4.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm-.861 1.542 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047l1.888.974V7.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V7s1.54-1.274 1.639-1.208zM5 9a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"></path>
                                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"></path>
                                            </svg></div>
                                        <p>{{$key}}</p>
                                    </a>
                                </div>
                                @endforeach

                        </div>

                        @if ($fileDetail->status == 1)
                        <hr>
                        <a class="text-decoration-none d-block p-3 text-center hvr-reveal bg-light text-success" href="{{asset($fileDetail->quote)}}" target="_blank">
                            <div style="font-size: 5rem;">
                                <svg class="bi bi-file-richtext" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M7 4.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm-.861 1.542 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047l1.888.974V7.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V7s1.54-1.274 1.639-1.208zM5 9a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"></path>
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"></path>
                                </svg></div>
                            <p>Quote Attach</p>
                        </a>
                        @endif

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#completeProcess" data-bs-dismiss="modal">Next</button>
                    </div>
                </div>
            </div>
            @endif
        </div>
        @if ($fileDetail)
        <div  wire:ignore.self id="completeProcess" class="modal fade" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Attach Quote to {{$fileDetail->first_name}}</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">

                        <div class="text-center text-success" style="font-size: 5rem;">
                            <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_h27x2otl.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                        </div>

                        <form wire:submit.prevent="uploadQuote({{$fileDetail->id}})">

                            <div class="mb-3"><label class="form-label" for="file_uploade">Attach Quote</label>
                                <input id="file_uploade" class="form-control" type="file" wire:model='file' accept=".png,.jpeg,.pdf"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Comment/Remarks</label>
                                <textarea class="form-control" wire:model='comment'></textarea>
                            </div>
                            @if ($file)
                                <button class="btn btn-success w-100" type="submit" data-bs-dismiss="modal">Complete Process</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </section>

</div>
