<?php

namespace Tmdb\Types;

enum AccountRatedTvRequestSortBy: string
{
    case CreatedAtAsc = "created_at.asc";
    case CreatedAtDesc = "created_at.desc";
}
