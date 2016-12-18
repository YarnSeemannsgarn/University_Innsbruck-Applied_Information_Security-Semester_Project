all:
	pdflatex project_paper.tex && \
	makeglossaries project_paper && \
	pdflatex project_paper.tex && \
	pdflatex project_paper.tex

clean:
	rm -f *.aux *.bbl *.blg *.log *.out *.toc *.pdf	*.lot *.log *.lof *.acn *.acr *.alg *.glg *.glo *.gls *.glsdefs *.idx *.ist

#bibtex project_paper &&
