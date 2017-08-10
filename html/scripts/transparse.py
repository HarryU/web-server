#!/usr/bin/python3
import csv
from urllib.request import urlopen
import collections
from bokeh.plotting import figure, save, output_file
from bokeh.layouts import column

colours = {'Rich':"orange",
	   'Harry':'blue',
	   'Jack':'green',
           'Mike':'magenta',
	   'Bekki':'red',
           'Jones':'black',
	   'Leaders':'brown'}
full_distance = 2729.6*1.6
checkpoints = [3109,2584,1657,949]
def get_csv():
	url = 'https://frrt.org/tcrno5/data/riders.csv'
	response = urlopen(url).read().decode("utf-8").split("\n")
	csv_file = csv.reader(response)
	data = {}
	for split in csv_file:
		if len(split)>0:
			data[split[1]] = split
	return data
def draw_plot(distances):
	to_draw=[]	
	zoom_to_draw = []
	for name, riders in distances.items():
		for rider in riders:
			position, _, rider_name, _,status,dtf,next_control,nckm,trackkm,routekm,av_track,av_speed,_ = rider
			to_draw.append((int(position), name,rider_name,float(dtf),float(nckm),status))
			if status!="S":
				zoom_to_draw.append((int(position), name,rider_name,float(dtf),float(nckm),status))
	sorted_draw = sorted(to_draw, key=lambda x:x[0],reverse=True)
	sorted_zoom_draw = sorted(zoom_to_draw, key=lambda x:x[0],reverse=True)
	rider_names = [item[2] for item in sorted_draw]
	zoom_rider_names = [item[2] for item in sorted_zoom_draw]
	dot = figure(title="Leaderboard",tools="hover",y_range=rider_names,x_range=[full_distance,0])
	zoom_dot = figure(title="Finish",tools="hover",y_range=zoom_rider_names,x_range=[500,0])
	for idx,(position,name,rider,distance,control_distance,status) in enumerate(sorted_draw):
		rider=idx+1
		draw_distance = distance
		if status=="A":
			style="solid"
			l_width=2
			dot.circle(distance,rider,size=5,fill_color=colours[name], line_color=colours[name],line_width=3, )
			dot.circle(distance-control_distance,rider,size=3,fill_color=colours[name], line_color=colours[name],line_width=3, )
		elif status=="F":
			style="solid"
			l_width=3
		else:
			style="dashed"
			l_width=2
		dot.segment(full_distance,rider,draw_distance,rider,line_width=l_width, line_dash=style,line_color=colours[name],legend=name)
		for i in range(4):
			dot.circle(checkpoints[i],rider,size=2,line_color=colours[name],line_width=1,fill_alpha=0.0)
	for idx,(position,name,rider,distance,control_distance,status) in enumerate(sorted_zoom_draw):
		rider=idx+1
		zoom_dot.circle(distance,rider,size=5,fill_color=colours[name], line_color=colours[name],line_width=3, )
		zoom_dot.segment(500,rider,distance,rider,line_width=2,line_color=colours[name],legend=name)

	dot.legend.location = "bottom_right"	
	zoom_dot.legend.location = "bottom_right"	

	output_file("/home/ubuntu/leaderboard.html")
	save(column(dot,zoom_dot))

def get_names_from_csv(csv):
	data = {'Rich':[230,59,139,204,216],
	'Jack':[52,155,137,4,86],
	'Bekki':[152,71,198,151,158],
	'Harry':[118,162,22,159,125],
	'Mike':[106,105,169,222,117],
	'Jones':[165,81,33,85,44]}
	
	actual_data = collections.defaultdict(list)
	for name,riders in data.items():
		for rider in riders:
			try:
				actual_data[name].append(csv[str(rider)])
			except KeyError:
				pass
	return actual_data

csv = get_csv()
if csv:
	names = get_names_from_csv(csv)
	draw_plot(names)
else:
	draw_plot({})
