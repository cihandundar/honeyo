@foreach (getDatas('Local Business', 1) as $local_business)
    @if ($local_business->get('status'))
        @php
            $price_range = $local_business->get('price-range');
            $state_province_region = $local_business->get('state-province-region');
            $latitude = $local_business->get('latitude');
            $longitude = $local_business->get('longitude');
            $opening_hours = $local_business->getEach('opening-hours');
            $open_24_7 = $local_business->get('open-24-7');
            $social_profiles = $local_business->getEach('social-profiles');
        @endphp
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "LocalBusiness",
                "name": "{{$local_business->get('name')}}",
                "image": "{{$local_business->get('image-url')}}",
                "@id": "{{$local_business->get('id-url')}}",
                "url": "{{$local_business->get('url')}}",
                "telephone": "{{$local_business->get('phone')}}",
                @if ($price_range)
                "priceRange": "{{$price_range}}",
                @endif
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "{{$local_business->get('street')}}",
                    "addressLocality": "{{$local_business->get('city')}}",
                    @if ($state_province_region)
                    "addressRegion": "{{$state_province_region}}",
                    @endif
                    "postalCode": "{{$local_business->get('zip-code')}}",
                    "addressCountry": "{{$local_business->get('country')}}"
                },
                @if ($latitude || $longitude)
                    "geo": {
                        "@type": "GeoCoordinates",
                        "latitude": {{$latitude}},
                        "longitude": {{$longitude}} 
                    },
                @endif
                @if ($open_24_7)
                    "openingHoursSpecification": {
                        "@type": "OpeningHoursSpecification",
                        "dayOfWeek": [
                        "Monday",
                        "Tuesday",
                        "Wednesday",
                        "Thursday",
                        "Friday",
                        "Saturday",
                        "Sunday"
                        ],
                        "opens": "00:00",
                        "closes": "23:59"
                    },
                @elseif (smartCheck($opening_hours))
                    "openingHoursSpecification": {{count($opening_hours) > 1 ? '[' : ''}}
                    @foreach ($opening_hours as $days)
                        {
                            "@type": "OpeningHoursSpecification",
                            "dayOfWeek": 
                            @if (count(explode(",", $days[0])) > 1)
                                [
                                    @foreach (explode(",", $days[0]) as $day)
                                        "{{$day}}"{{!$loop->last ? ',' : ''}}
                                    @endforeach
                                ],
                            @else
                                "{{$days[0]}}",
                            @endif
                            "opens": "08:00",
                            "closes": "21:00"
                        }{{!$loop->last ? ',' : ''}}
                    @endforeach
                    {{count($opening_hours) > 1 ? ']' : ''}},
                @endif
                @if (count($social_profiles))
                    "sameAs": 
                    @if (count($social_profiles) > 1)
                        [
                            @foreach ($social_profiles as $social_media)
                            "{{$social_media[0]}}"{{!$loop->last ? ',' : ''}}
                            @endforeach
                        ] 
                    @else
                        "{{$social_profiles[0][0]}}"
                    @endif
                @endif
            }
        </script>
    @endif
@endforeach
